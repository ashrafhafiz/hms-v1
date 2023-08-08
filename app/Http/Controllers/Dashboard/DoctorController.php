<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Interfaces\DoctorRepositoryInterface;
use App\Interfaces\SectionRepositoryInterface;
use App\Models\Doctor;
use App\Models\WorkingDay;
use App\Traits\UploadFileTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class DoctorController extends Controller
{
    use UploadFileTrait;
    private $doctorRepository;
    private $sectionRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository, SectionRepositoryInterface $sectionRepository)
    {
        $this->doctorRepository = $doctorRepository;
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $working_days = WorkingDay::all();
        $doctors = $this->doctorRepository->getAllDoctorsWithSchedule();
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.doctors.index', compact('doctors', 'sections', 'working_days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.doctors.add', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {

        $schedule = array();
        foreach ($request->schedule as $key=>$value){
            $schedule[] = $value+0;
        };
//          dd($schedule);

//        $weekdays = Carbon::getDays();
//
//        foreach ($request->schedule as $key => $day) {
//            foreach (config('app.languages') as $locale => $value) {
//                ${"appointments".'_'.$locale}[] = Carbon::create($weekdays[$day])->locale($locale)->dayName;
//            }
//        }

        DB::beginTransaction();

        try {
            // $doctor = New Doctor();

            // Doctor's table data
            $doctorDetails = [
                'en' => [
                    'name' =>  $request->name_en,
//                    'appointments' => implode(',', $appointments_en),
                ],
                'ar' => [
                    'name' =>  $request->name_ar,
//                    'appointments' => implode(',', $appointments_ar),
                ],
                'email' => $request->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'section_id' => intval($request->section_id),
                'price' => $request->price,
                'status' => 1,
                'remember_token' => Str::random(10),
            ];

            // dd($doctorDetails);

            $doctor = $this->doctorRepository->createDoctor($doctorDetails);

            $doctor->working_days()->attach($request->schedule);

            $this->verifyAndStoreImageFile($request, 'profile_image', 'doctors', 'hms_uploaded_images',$doctor->id,'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.index');

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $working_days = WorkingDay::all();
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.doctors.edit', compact('doctor', 'sections', 'working_days'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {

//        dd($request->all());

        DB::beginTransaction();

        try {

            // Doctor's table data
            $doctorNewDetails = [
                'en' => [
                    'name' =>  $request->name_en,
                ],
                'ar' => [
                    'name' =>  $request->name_ar,
                ],
                'email' => $request->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'section_id' => intval($request->section_id),
                'price' => $request->price,
                'status' => 1,
                'remember_token' => Str::random(10),
            ];

            $this->doctorRepository->updateDoctor($doctor, $doctorNewDetails);

            $doctor->working_days()->sync($request->schedule);

            if ($request->profile_image) {
                $this->deleteImageFileAndRecord('hms_uploaded_images', 'doctors/'.$doctor->image->file_url, $doctor->id, $doctor->image->file_url);
                $this->verifyAndStoreImageFile($request, 'profile_image', 'doctors', 'hms_uploaded_images',$doctor->id,'App\Models\Doctor');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('doctors.index');

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->delete_single_item == 1) {

            $doctor = Doctor::findOrFail($request->id);

            $this->deleteImageFileAndRecord('hms_uploaded_images', 'doctors/'.$request->profile_image, $request->id, $request->profile_image);

            $this->doctorRepository->deleteDoctor($doctor->id);

            session()->flash('delete');
            return redirect()->route('doctors.index');

        } else {

            $items = explode(',',$request->delete_multiple_items);

            foreach ($items as $item) {
                $doctor = Doctor::findOrFail($item);

                $this->deleteImageFileAndRecord('hms_uploaded_images', 'doctors/'.$doctor->image->file_url, $doctor->id, $doctor->image->file_url);

                $this->doctorRepository->deleteDoctor($doctor->id);
            }

            session()->flash('delete');
            return redirect()->route('doctors.index');
        }
    }

    public function changePassword(Request $request, Doctor $doctor)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        try {
            $doctor = Doctor::findOrFail($request->id);
            $hashedPassword = Hash::make($request->password);

            $this->doctorRepository->changeDoctorPassword($doctor, $hashedPassword);

            session()->flash('edit');
            return redirect()->route('doctors.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request)
    {

        $this->validate($request, [
            'status' => 'required',
        ]);


        // $status = $request->status;
        // OR
        $doctorNewDetails = [
            'status' => $request->status,
        ];

        try {
            $doctor = Doctor::findOrFail($request->id);

            // $this->doctorRepository->changeDoctorStatus($doctor, $status);
            // OR
            $this->doctorRepository->updateDoctor($doctor, $doctorNewDetails);

            session()->flash('edit');
            return redirect()->route('doctors.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
