<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huisdier extends Model
{
    protected $table = 'huisdier';

    protected $fillable = [
        'name', 'eigenaar_id', 'age', 'animaltype', 'note',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
    public function afspraken()
    {
        return $this->hasMany(Afspraak::class, 'huisdier_id');
    }
}
