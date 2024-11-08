<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            "firstname" => "Quinten",
            "lastname" => "Damsma",
            "username" => "qdamsma",
            "email" => "qdamsma@gmail.com",
            "password" => bcrypt("ikgamijnwachtwoordhiernietgeven"),
            "role" => "admin"
        ]);
        DB::table('users')->insert([
            "firstname" => "Bas",
            "lastname" => "Ligthart",
            "username" => "bligthart",
            "email" => "bligthart@gmail.com",
            "password" => bcrypt("olifant123"),
        ]);
        DB::table('users')->insert([
            "firstname" => "admin",
            "lastname" => "admin",
            "username" => "admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
