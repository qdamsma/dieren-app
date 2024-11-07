<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huisdier extends Model
{
    protected $table = 'huisdier';

    protected $fillable = [
        'name', 'eigenaar_id', 'age', 'animaltype', 'note',
    ];
}
