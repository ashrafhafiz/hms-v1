<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Interfaces\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function getAllDoctors()
    {
        return Doctor::all();
    }

    public function getAllDoctorsWithSchedule()
    {
        return Doctor::with('working_days')->get();
    }

    public function getDoctorById($doctorId)
    {
        return Doctor::findOrFail($doctorId);
    }

    public function deleteDoctor($doctorId)
    {
        return Doctor::destroy($doctorId);
    }

    public function createDoctor($doctorDetails)
    {
        return Doctor::create($doctorDetails);
    }

    public function updateDoctor($doctor, array $newDetails)
    {
        return $doctor->update($newDetails);
    }

    public function getFulfilledDoctors()
    {
        return;
    }

    public function changeDoctorPassword($doctor, $hashedPassword)
    {
        $doctor->password = $hashedPassword;
        return $doctor->save();
    }

    public function changeDoctorStatus($doctor, $status)
    {
        $doctor->status = $status;
        return $doctor->save();
    }

}
