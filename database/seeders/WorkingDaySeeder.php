<?php

namespace Database\Seeders;

use App\Models\WorkingDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('working_days')->truncate();
        DB::table('working_day_translations')->truncate();

        $working_days = [
            [
                'en' => [
                    'working_day_name' => 'Sunday',
                ],
                'ar' => [
                    'working_day_name' => 'الأحد',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Monday',
                ],
                'ar' => [
                    'working_day_name' => 'الأثنين',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Tuesday',
                ],
                'ar' => [
                    'working_day_name' => 'الثلاثاء',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Wednesday',
                ],
                'ar' => [
                    'working_day_name' => 'الأربعاء',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Thursday',
                ],
                'ar' => [
                    'working_day_name' => 'الخميس',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Friday',
                ],
                'ar' => [
                    'working_day_name' => 'الجمعة',
                ]
            ],
            [
                'en' => [
                    'working_day_name' => 'Saturday',
                ],
                'ar' => [
                    'working_day_name' => 'السبت',
                ]
            ],
        ];

        foreach ($working_days as $working_day) {
            WorkingDay::create($working_day);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
