<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatuses = [];

        for ($i = 1; $i <= 25; $i++) {
            $createdAt = Carbon::create(null, rand(1, 12), 1, 0, 0, 0); // Random date between 1 and 30 days ago
            $updatedAt = $createdAt->copy()->addSeconds(rand(1, 86400)); // Random time between createdAt and 24 hours later

            $orderStatuses[] = [
                'order_id' => $i,
                'status_id' => rand(1, 5),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }

        DB::table('order_statuses')->insert($orderStatuses);
    }
}
