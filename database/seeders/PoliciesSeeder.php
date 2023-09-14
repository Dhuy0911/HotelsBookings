<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Room Cancellation Policy',
                'description' => '
                Free cancellation is allowed up to 24 hours prior to the check-in date.
                Cancellations made after the specified time or without prior notice will incur corresponding charges.
                The room cancellation policy may vary depending on the room type and booking period. Please check the detailed information when making a reservation.'
            ],
            [
                'name' => 'Children Policy',
                'description' => '
                Children under 12 years old can stay for free when using existing beds in the room with adults.
                Additional charges may apply if an extra bed or cot is requested.'
            ],
            [
                'name' => 'Pets Policy',
                'description' => 'We do not allow pets in the hotel.
                Please note that violating this policy may result in refusal of accommodation or additional penalties.'
            ],
            [
                'name' => 'Smoking Policy',
                'description' => 'Our hotel is a non-smoking property. Smoking is strictly prohibited in all indoor areas, including rooms, common areas, and dining areas.
                We provide designated smoking areas outside the premises where guests can smoke.
                Violation of the smoking policy may result in penalties or additional charges.'
            ]
        ];
        DB::table('policies')->insert($data);
    }
}
