<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Interfaces\DoctorRepositoryInterface;
use App\Interfaces\SectionRepositoryInterface;
use App\Models\Doctor;
use App\Traits\UploadFileTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $doctors = $this->doctorRepository->getAllDoctors();
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.doctors.index', compact('doctors', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
         // dd($request->all());

        $weekdays = Carbon::getDays();

        foreach ($request->schedule as $key => $day) {
            foreach (config('app.languages') as $locale => $value) {
                ${"appointments".'_'.$locale}[] = Carbon::create($weekdays[$day])->locale($locale)->dayName;
            }
        }

        DB::beginTransaction();

        try {
            // $doctor = New Doctor();

            // Doctor's table data
            $doctorDetails = [
                'en' => [
                    'name' =>  $request->name_en,
                    'appointments' => implode(',', $appointments_en),
                ],
                'ar' => [
                    'name' =>  $request->name_ar,
                    'appointments' => implode(',', $appointments_ar),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
