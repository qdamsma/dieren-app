<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    protected $table = 'afspraken';

    public function huisdier()
    {
        return $this->belongsTo(Huisdier::class, 'huisdier_id');
    }
}
