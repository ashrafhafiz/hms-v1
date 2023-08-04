<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\SectionRepositoryInterface;
use App\Models\Section;
use function config;

class SectionController extends Controller
{
    private $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.sections.index', compact('sections'));
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
    public function store(Request $request)
    {
        // $sectionDetails = new Section();
        // foreach (['en', 'ar'] as $locale) {
        //     $sectionDetails->translateOrNew($locale)->name = $request->input('name_' . $locale);
        //     $sectionDetails->translateOrNew($locale)->description = $request->input('description_' . $locale);
        // };

        foreach (config('app.languages') as $key => $value) {
            $sectionDetails[$key] = [
                'name' => $request->input("name_" . $key),
                'description' => $request->input("description_" . $key),
            ];
        };

        // foreach (['en', 'ar'] as $locale) {
        //     $sectionDetails[$locale] = [
        //         'name' => $request->input("name_" . $locale),
        //         'description' => $request->input("description_" . $locale),
        //     ];
        // };
        // dd($sectionDetails);

        Section::create($sectionDetails);
        // $this->sectionRepository->createSection($sectionDetails);
        session()->flash('add');
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $section = Section::findOrFail($request->id);

        foreach (config('app.languages') as $key => $value) {
            $newDetails[$key] = [
                'name' => $request->input("name_" . $key),
                'description' => $request->input("description_" . $key),
            ];
        };

        $this->sectionRepository->updateSection($section, $newDetails);
        // $section->update($newDetails);

        session()->flash('edit');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->id);
        $this->sectionRepository->deleteSection($section->id);
        session()->flash('delete');
        return redirect()->route('sections.index');
    }
}
