<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FacilitiesSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(BedTypeSeeder::class);
        $this->call(PlaceTypeSeeder::class);
        $this->call(PoliciesSeeder::class);
        User::factory(20)->create();
        Hotel::factory(20)->create();
    }
}
