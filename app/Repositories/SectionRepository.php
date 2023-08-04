<?php

namespace App\Repositories;

use App\Models\Section;
use App\Interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function getAllSections()
    {
        return Section::all();
    }

    public function getSectionById($sectionId)
    {
        return Section::findOrFail($sectionId);
    }

    public function deleteSection($sectionId)
    {
        return Section::destroy($sectionId);
    }

    public function createSection($sectionDetails)
    {
        return Section::create($sectionDetails);
    }

    public function updateSection($section, array $newDetails)
    {
        return $section->update($newDetails);
    }

    public function getFulfilledSections()
    {
        return;
    }
}
