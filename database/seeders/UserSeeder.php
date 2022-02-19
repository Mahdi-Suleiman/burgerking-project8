<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = Hash::make('123456789');
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => $password,
                'role' => 'admin',
                'mobile_number' => '0777777777'
            ],
            [
                'name' => 'mahdi',
                'email' => 'mh@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'farah',
                'email' => 'farah@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'haneen',
                'email' => 'haneen@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'kholoud',
                'email' => 'kholoud@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
        ]);
    }
}