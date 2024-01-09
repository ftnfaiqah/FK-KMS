<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 1,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 0,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'technical',
                'email' => 'technical@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 2,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'bursary',
                'email' => 'bursary@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 3,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'pupuk',
                'email' => 'pupuk@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 4,
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
