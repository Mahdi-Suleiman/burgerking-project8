<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contacts')->insert([
            [
                'contact_name' => 'Mahdi',
                'contact_email' => 'mahdi@gmail.com',
                'subject' => 'about menu',
                'message' => 'hello can i ask about if you have special menu for people with allergies '
            ],
            [
                'contact_name' => 'Farah',
                'contact_email' => 'farahi@gmail.com',
                'subject' => 'about table',
                'message' => 'Do you hava outside tables'
            ],
            [
                'contact_name' => 'Haneen',
                'contact_email' => 'haneen@gmail.com',
                'subject' => 'feedback',
                'message' => 'very comfortable place'
            ],
            [
                'contact_name' => 'Kholoud',
                'contact_email' => 'kholoud@gmail.com',
                'subject' => 'feedback',
                'message' => 'kind staff'
            ],
        ]);
    }
}
