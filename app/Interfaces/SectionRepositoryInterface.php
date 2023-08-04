<?php

namespace App\Interfaces;

interface SectionRepositoryInterface
{
    public function getAllSections();
    public function getSectionById($sectionId);
    public function deleteSection($sectionId);
    public function createSection(array $sectionDetails);
    public function updateSection($section, array $newDetails);
    public function getFulfilledSections();
}
