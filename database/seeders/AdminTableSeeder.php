<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('admins')->truncate();

        // for ($i = 1; $i <= 5; $i++) {
        //     \App\Models\Admin::factory()->create([
        //         'name' => 'Admin' . $i,
        //         'email' => 'admin' . $i . '@example.com',
        //     ]);
        // }

        $admins = [
            [
                'name' => 'Admin1',
                'email' => 'admin1@example.com',
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@example.com',
            ],
        ];

        foreach ($admins as $admin) {
            \App\Models\Admin::factory()->create($admin);
        };

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
