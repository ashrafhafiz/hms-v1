<?php

namespace Database\Seeders;

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

        for ($i = 1; $i <= 10; $i++) {
            $user = \App\Models\Doctor::factory()->create();
            $image = [
                'file_url' => fake()->imageUrl(),
                'imageable_id' => $user->id,
                'imageable_type' => 'App\Models\Doctor'
            ];
            \App\Models\Image::create($image);

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}