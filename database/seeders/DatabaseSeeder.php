<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\MasterStatusSeeder;
use Database\Seeders\MerchantSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\OrderItemsSeeder;
use Database\Seeders\OrderStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            MasterStatusSeeder::class,
            MerchantSeeder::class,
            ProductSeeder::class,
            OrderItemsSeeder::class,
            OrderStatusSeeder::class
        ]);
    }
}
