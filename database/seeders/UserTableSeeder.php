<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        // for ($i = 1; $i <= 5; $i++) {
        //     \App\Models\User::factory()->create([
        //         'name' => 'User' . $i,
        //         'email' => 'user' . $i . '@example.com',
        //     ]);
        // }

        $users = [
            [
                'name' => 'Ashraf Hafiz',
                'email' => 'ashrafha@example.com',
            ],
            [
                'name' => 'Ayman Hafiz',
                'email' => 'aymanha@example.com',
            ],
            [
                'name' => 'Amal Hafiz',
                'email' => 'amalha@example.com',
            ],
            [
                'name' => 'Ahmed Hafiz',
                'email' => 'ahmedha@example.com',
            ],
            [
                'name' => 'Amgad Hafiz',
                'email' => 'amgadha@example.com',
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        };

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
