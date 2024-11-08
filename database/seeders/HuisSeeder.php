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
        DB::table('huizen')->insert([
            [
                "eigenaar_id" => "1",
                'address' => '123 Straatnaam',
                'city' => 'Amsterdam',
                'picture_house' => 'images/Logo.png',
            ],
            [
                "eigenaar_id" => "2",
                'address' => '456 Laanstraat',
                'city' => 'Rotterdam',
                'picture_house' => 'images/Logo.png',
            ],
        ]);
    }
}
