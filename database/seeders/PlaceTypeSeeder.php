<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Hotel',
                'description' => 'Hotel',
            ],
            [
                'name' => 'Home Stay',
                'description' => 'Home Stay',
            ],
            [
                'name' => 'Apartments',
                'description' => 'Apartments',
            ],
            [
                'name' => 'Villa',
                'description' => 'Villa',
            ],
            [
                'name' => 'Resort',
                'description' => 'Resort',
            ]
        ];
        DB::table('place_types')->insert($data);
    }
}
