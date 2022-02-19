<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tables')->insert([
            [
                "number" => 1,
                "reserved" => 'not reserved'
            ],
            [
                "number" => 2,
                "reserved" => 'not reserved'
            ],
            [
                "number" => 3,
                "reserved" => 'reserved'
            ],
        ]);
    }
}