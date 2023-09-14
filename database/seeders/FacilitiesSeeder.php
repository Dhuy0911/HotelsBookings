<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'name' => 'Restaurant',
                'description' => 'fa-solid fa-utensils',
            ],
            [
                'name' => 'Parking',
                'description' => 'fa-solid fa-parking',
            ],
            [
                'name' => 'Pool',
                'description' => 'fa-solid fa-swimming-pool',
            ],
            [
                'name' => 'Spa',
                'description' => 'fa-solid fa-spa',
            ],
            [
                'name' => 'Gym',
                'description' => 'fa-solid fa-dumbbell',
            ],
            [
                'name' => 'Bar',
                'description' => 'fa-solid fa-wine-glass-empty',
            ],
            [
                'name' => 'Airport Shuttle',
                'description' => 'fa-solid fa-plane-departure',
            ],
            [
                'name' => 'Free parking',
                'description' => 'fa-solid fa-parking',
            ],
            [
                'name' => 'Elevator in building',
                'description' => 'fa-solid fa-elevator',
            ]
        ];
        DB::table('facilities')->insert($data);
    }
}
