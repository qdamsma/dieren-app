<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AfspraakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('afspraken')->insert([
            [
                'huisdier_id' => 1,
                'eigenaar_id' => 1,
                'huis_id' => 1,
                'start_datum' => '10-11-2024',
                'eind_datum' => '12-11-2024',
                'tijd_start' => '09:00:00',
                'tijd_eind' => '17:00:00',
                'uurtarief' => 15.50,
                'status' => 'gepland',
                'opmerkingen' => 'Graag het huisdier schoonmaken.',
            ],
            [
                'huisdier_id' => 2,
                'eigenaar_id' => 2,
                'huis_id' => 2,
                'start_datum' => '12-11-2024',
                'eind_datum' => '14-11-2024',
                'tijd_start' => '12:00:00',
                'tijd_eind' => '20:00:00',
                'uurtarief' => 15.50,
                'status' => 'gepland',
                'opmerkingen' => 'Houdt van lange wandelingen.',
            ],
        ]);
    }
}
