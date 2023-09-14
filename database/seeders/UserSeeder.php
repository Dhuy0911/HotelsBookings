<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = [
        //     [
        //         'email' => 'admin@gmail.com',
        //         'password' => bcrypt(123123123),
        //         'level' => 3,
        //         'status' => 1,
        //     ]
        // ];
        // $admin_info = [
        //     [
        //         'name' => 'Admin',
        //         'phone' => '0987654321',
        //         'gender' => 1,
        //         'address' => 'Ha Noi',
        //         'image' => '1682151988_person_3.jpg',
        //         'user_id' => 1,

        //     ]

        // ];
        // for ($i = 0; $i < 20; $i++) {
        //     $user = [[
        //         'email' => 'user' . $i . '@gmail.com',
        //         'password' => bcrypt(123123123),
        //     ]];
        //     $user_info = [
        //         [
        //             'name' => 'User' . $i,
        //             'phone' => '',
        //             'gender' => rand(1, 2),
        //             'address' => '',
        //             'image' => '',
        //             'user_id' => $i + 2
        //         ]
        //     ];
        //     DB::table('users')->insert($user);
        //     DB::table('user_info')->insert($user_info);
        // };
    }
}
