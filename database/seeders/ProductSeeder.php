<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodProducts = [
            'Pizza',
            'Burger',
            'Sushi',
            'Pasta',
            'Tacos',
            'Steak',
            'Curry',
            'Noodles',
            'Salad',
            'Sandwich',
            'Fried Chicken',
            'Ice Cream',
            'Pancakes',
            'Dumplings',
            'Ramen',
            'Shawarma',
            'Fish and Chips',
            'Donuts',
            'Biryani',
            'Dim Sum',
            // Add more food product names as needed
        ];

        $products = [];

        $foodProductsCount = count($foodProducts);
        // $merchantCount = 10;

        for ($i = 0; $i < 20; $i++) {
            $products[] = [
                'name' => $foodProducts[$i % $foodProductsCount],
                'merchant_id' => rand(1, 10),
                'price' => rand(11000, 40000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
