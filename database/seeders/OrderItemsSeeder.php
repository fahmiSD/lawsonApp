<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItems = [];

        for ($i = 1; $i <= 25; $i++) {
            $createdAt = Carbon::create(null, rand(1, 12), 1, 0, 0, 0);
            $updatedAt = $createdAt->copy()->addSeconds(rand(1, 86400)); // Random time between createdAt and 24 hours later

            $orderItems[] = [
                'date' => $createdAt->format('Y-m-d'),
                'quantity' => rand(50, 500),
                'product_id' => rand(1, 10),
                'user_id' => rand(1, 5),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }

        DB::table('order_items')->insert($orderItems);
    }
}
