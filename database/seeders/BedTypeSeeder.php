<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Single bed',
                'description' => ''
            ],
            [
                'name' => 'Double bed',
                'description' => ''
            ],
            [
                'name' => 'King bed',
                'description' => ''
            ],
            [
                'name' => 'Queen bed',
                'description' => ''
            ],
            [
                'name' => 'Twin bed',
                'description' => ''
            ],
            [
                'name' => 'Bunk bed',
                'description' => ''
            ],

        ];
        DB::table('bed_types')->insert($data);
    }
}
