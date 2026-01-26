<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    protected $table = 'votos';

    protected $fillable = [
        'candidata_id',
        'ip',
        'device_id'
    ];

    public function candidata(){
        return $this->belongsTo(Candidatas::class, 'candidata_id');
    }
}
