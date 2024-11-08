<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huis extends Model
{
    protected $table = 'huizen';

    protected $fillable = [
        'address', 'city', 'picture_house', 'eigenaar_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
