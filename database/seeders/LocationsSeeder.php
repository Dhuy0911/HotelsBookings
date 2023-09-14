<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Ho Chi Minh City',
                'image' => '1684041646_hochiminh.jpg',
            ],
            [
                'name' => 'Ha Noi City',
                'image' => '1684041655_hanoi.jpg',
            ],
            [
                'name' => 'Da Nang City',
                'image' => '1684041663_danang.jpg',
            ],
            [
                'name' => 'Nha Trang City',
                'image' => '1684041672_nhatrang.jpg',
            ],
            [
                'name' => 'Hoi An City',
                'image' => '1684041680_hoian.jpg',
            ],
            [
                'name' => 'Da Lat City',
                'image' => '1684041692_dalat.jpg',
            ],

        ];
        DB::table('locations')->insert($data);
    }
};
