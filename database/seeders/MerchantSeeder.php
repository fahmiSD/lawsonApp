<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = [
            [
                'merchant_name' => 'Merchant 1',
                'city_id' => '1',
                'address' => '123 Main St',
                'phone' => '123456789',
                'expired_date' => '2023-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 2',
                'city_id' => '2',
                'address' => '456 Elm St',
                'phone' => '987654321',
                'expired_date' => '2024-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 3',
                'city_id' => '3',
                'address' => '789 Oak St',
                'phone' => '555555555',
                'expired_date' => '2023-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 4',
                'city_id' => '4',
                'address' => '987 Pine St',
                'phone' => '777777777',
                'expired_date' => '2024-02-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 5',
                'city_id' => '5',
                'address' => '321 Cedar St',
                'phone' => '444444444',
                'expired_date' => '2023-09-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more merchant data as needed
            [
                'merchant_name' => 'Merchant 6',
                'city_id' => '6',
                'address' => '789 Oak St',
                'phone' => '555555555',
                'expired_date' => '2023-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 7',
                'city_id' => '7',
                'address' => '987 Pine St',
                'phone' => '777777777',
                'expired_date' => '2024-02-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 8',
                'city_id' => '8',
                'address' => '321 Cedar St',
                'phone' => '444444444',
                'expired_date' => '2023-09-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 9',
                'city_id' => '9',
                'address' => '789 Oak St',
                'phone' => '555555555',
                'expired_date' => '2023-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merchant_name' => 'Merchant 10',
                'city_id' => '10',
                'address' => '987 Pine St',
                'phone' => '777777777',
                'expired_date' => '2024-02-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('merchants')->insert($merchants);
    }
}
