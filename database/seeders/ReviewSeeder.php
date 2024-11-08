<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'afspraak_id' => "1",    
                'review' => "was mooi",    
                'rating' => 5,             
            ],
        ]);
    }
}