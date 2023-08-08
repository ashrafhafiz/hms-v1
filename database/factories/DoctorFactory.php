<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'email' => fake()->unique()->safeEmail(),
            'en' => [
                'name' => fake()->name(),
//                'appointments' => fake()->randomElement(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
            ],
            'ar' => [
                'name' => fake('ar_EG')->name(),
//                'appointments' => fake()->randomElement(['السبت', 'الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة']),
            ],
            'email' => fake()->userName() . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'section_id' => fake()->randomElement(Section::all())->id,
            'price' => fake()->randomElement([100, 200, 300]),
        ];
    }
}
