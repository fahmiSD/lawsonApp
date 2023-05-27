<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'Active',
                'description' => 'The status is currently active.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inactive',
                'description' => 'The status is currently inactive.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pending',
                'description' => 'The status is pending approval.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Completed',
                'description' => 'The status is completed.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cancelled',
                'description' => 'The status is cancelled.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('master_statuses')->insert($statuses);
    }
}
