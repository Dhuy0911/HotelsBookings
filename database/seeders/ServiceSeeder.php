<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Wifi',
                'description' => 'fa-solid fa-wifi',
            ],
            [
                'name' => 'TV',
                'description' => 'fa-solid fa-tv',
            ],
            [
                'name' => 'Air Conditioning',
                'description' => 'fa-solid fa-snowflake',
            ],
            [
                'name' => 'Laundry',
                'description' => 'fa-solid fa-laundry-basket',
            ],
            [
                'name' => 'Bike rental',
                'description' => 'fa-solid fa-bicycle',
            ],
            [
                'name' => 'Buffet Breakfast',
                'description' => 'fa-solid fa-utensils',
            ],
            [
                'name' => 'Bathroom',
                'description' => 'fa-solid fa-bath',
            ],
            [
                'name' => 'Pet friendly',
                'description' => 'fa-solid fa-dog',
            ]

        ];
        DB::table('services')->insert($data);
    }
}
