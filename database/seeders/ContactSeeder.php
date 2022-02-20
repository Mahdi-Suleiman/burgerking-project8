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
                'subject' => 'subject 1',
                'message' => 'message 1'
            ],
            [
                'contact_name' => 'Farah',
                'contact_email' => 'farahi@gmail.com',
                'subject' => 'subject 2',
                'message' => 'message 2'
            ],
            [
                'contact_name' => 'Haneen',
                'contact_email' => 'haneen@gmail.com',
                'subject' => 'subject 3',
                'message' => 'message 3'
            ],
            [
                'contact_name' => 'Kholoud',
                'contact_email' => 'kholoud@gmail.com',
                'subject' => 'subject 4',
                'message' => 'message 4'
            ],
        ]);
    }
}