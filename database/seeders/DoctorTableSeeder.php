<?php

namespace Database\Seeders;

use App\Models\WorkingDay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('doctors')->truncate();
        DB::table('doctor_translations')->truncate();
        DB::table('images')->truncate();
        DB::table('doctor_working_day')->truncate();

        for ($i = 1; $i <= 10; $i++) {
            $doctor = \App\Models\Doctor::factory()->create();
            $image = [
//                'file_url' => fake()->imageUrl(),
                'file_url' => 'default.png',
                'imageable_id' => $doctor->id,
                'imageable_type' => 'App\Models\Doctor'
            ];
            \App\Models\Image::create($image);
            $schedule = WorkingDay::all()->random(rand(1,7))->pluck('id')->toArray();
            $doctor->working_days()->attach($schedule);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
