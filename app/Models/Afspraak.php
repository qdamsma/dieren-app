<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    protected $table = 'afspraken';

    protected $fillable = [
        'huisdier_id', 'eigenaar_id', 'huis_id', 'start_datum', 'eind_datum', 'tijd_start', 'tijd_eind', 'uurtarief', 'status', 'opmerkingen',
    ];

    public function huisdier()
    {
        return $this->belongsTo(Huisdier::class);
    }

    public function huis()
    {
        return $this->belongsTo(Huis::class);
    }

    public function eigenaar()
    {
        return $this->belongsTo(User::class, 'eigenaar_id');
    }
}
