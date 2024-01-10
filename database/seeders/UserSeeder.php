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
                'icNum' => '880718091229',
                'phoneNum' => '0166102517',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 1,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'user',
                'icNum' => '991230101889',
                'phoneNum' => '01123652436',
                'email' => 'user@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 0,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'technical',
                'icNum' => '780211091780',
                'phoneNum' => '0182309876',
                'email' => 'technical@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 2,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'bursary',
                'icNum' => '800130080774',
                'phoneNum' => '0198907829',
                'email' => 'bursary@gmail.com',
                'email_verified_at' => '2023-05-27 11:03:10',
                'role' => 3,
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'pupuk',
                'icNum' => '900927101880',
                'phoneNum' => '0143812779',
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
