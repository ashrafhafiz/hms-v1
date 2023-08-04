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
}
