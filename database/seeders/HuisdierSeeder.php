<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class HuisdierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('huisdier')->delete();
        DB::table('huisdier')->insert([
            "name" => "Tom",
            "eigenaar_id" => "2",
            "age" => "5",
            "animaltype" => "Olifant",  
            "note" => "heeft last van linkerpoot, neemt medicijnen. Kijk uit bij medicijnen voeren",      
        ]);
        DB::table('huisdier')->insert([
            "name" => "Mollie",
            "eigenaar_id" => "1",
            "age" => "20",
            "animaltype" => "Kat",    
        ]);
    }
}
