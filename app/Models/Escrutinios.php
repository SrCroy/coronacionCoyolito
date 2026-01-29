<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escrutinios extends Model
{
    protected $table = 'escrutinios';

    protected $fillable = [
        'candidata_id',
        'numeroEscrutinio',
        'monto',
    ];

    public function candidata(){
        return $this->belongsTo(Candidatas::class, 'candidata_id');
    }

    // CORRECCIÓN: Cambia 'candidatas_id' por 'candidata_id'
    public function escrutinios(){
        return $this->hasMany(Escrutinios::class, 'candidata_id');
    }

    public function votos(){
        return $this->hasMany(Votos::class, 'candidata_id');
    }
}
