<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'full_name' => 'Demo Admin',
                'email' => 'admin@example.com',
                'password' => '$2y$10$qadZZGojtUbXxaM3242Je.TXz6.L8lUDWqbmGedgJ2ubUDAWYMa4y',
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 133,
                'full_name' => 'Nguyễn Ngọc Huy',
                'email' => 'huy.nguyen22@student.passerellesnumeriques.org',
                'password' => '$2y$10$hmzzi/zBabmjxT7BPqeyxOgcAL4e7yGG73lqyqVTA3Tmh0JvRMjjO',
                'remember_token' => null,
                'created_at' => '2021-07-07 11:24:47',
                'updated_at' => '2021-07-07 11:24:47'
            ],
            [
                'id' => 134,
                'full_name' => 'Mr Dinh',
                'email' => 'dinhvcvn@gmail.com',
                'password' => '$2y$10$rAxl4YujxIGRGjr5WTnHMe1896cgg382/vytGNz9NU1.DjeAa9F02',
                'remember_token' => null,
                'created_at' => '2021-10-19 03:19:41',
                'updated_at' => '2021-10-19 03:19:41'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
