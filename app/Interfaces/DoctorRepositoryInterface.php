<?php

namespace App\Interfaces;

interface DoctorRepositoryInterface
{
    public function getAllDoctors();
    public function getAllDoctorsWithSchedule();
    public function getDoctorById($doctorId);
    public function deleteDoctor($doctorId);
    public function createDoctor(array $doctorDetails);
    public function updateDoctor($doctor, array $newDetails);
    public function getFulfilledDoctors();
    public function changeDoctorPassword($doctor, $hashedPassword);
    public function changeDoctorStatus($doctor, $status);
}
