<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'date_of_birth' => '1990-01-01',
                'phone' => '123456789',
                'address' => '123 Main St',
                'active' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'date_of_birth' => '1992-05-15',
                'phone' => '987654321',
                'address' => '456 Elm St',
                'active' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Michael Johnson',
                'email' => 'michaeljohnson@example.com',
                'date_of_birth' => '1985-09-30',
                'phone' => '555555555',
                'address' => '789 Oak St',
                'active' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Emily Davis',
                'email' => 'emilydavis@example.com',
                'date_of_birth' => '1998-12-10',
                'phone' => '777777777',
                'address' => '987 Pine St',
                'active' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'David Brown',
                'email' => 'davidbrown@example.com',
                'date_of_birth' => '1993-06-25',
                'phone' => '444444444',
                'address' => '321 Cedar St',
                'active' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
