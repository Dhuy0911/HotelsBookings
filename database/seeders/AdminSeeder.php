<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt(123123123),
                'level' => 3,
                'status' => 1,
            ]
        ];
        $admin_info = [
            [
                'name' => 'Admin',
                'phone' => '0987654321',
                'gender' => 1,
                'address' => 'Ho Chi Minh',
                'user_id' => 1,

            ]

        ];
        DB::table('users')->insert($admin);
        DB::table('user_info')->insert($admin_info);
    }
}
