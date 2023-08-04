<?php

namespace App\Interfaces;

interface DoctorRepositoryInterface
{
    public function getAllDoctors();
    public function getDoctorById($doctorId);
    public function deleteDoctor($doctorId);
    public function createDoctor(array $doctorDetails);
    public function updateDoctor($doctor, array $newDetails);
    public function getFulfilledDoctors();
}
