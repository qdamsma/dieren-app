<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'afspraak_id',
        'review',
        'rating',
    ];
}
