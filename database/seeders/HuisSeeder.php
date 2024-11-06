<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class HuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('huis')->insert([
            "address" => "blablabla10",
            "city" => "Leiden",
            "eigenaar_id" => "2",       
        ]);
    }
}
