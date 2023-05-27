<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['Jakarta', 106.8272, -6.1751],
            ['Surabaya', 112.7508, -7.2575],
            ['Bandung', 107.6098, -6.9175],
            ['Medan', 98.6711, 3.5952],
            ['Semarang', 110.4229, -6.9667],
            ['Palembang', 104.7458, -2.9909],
            ['Makassar', 119.4360, -5.1477],
            ['Tangerang', 106.6297, -6.1783],
            ['Depok', 106.8186, -6.4000],
            ['Batam', 104.0586, 1.0456],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name' => $city[0],
                'longitude' => $city[1],
                'latitude' => $city[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
