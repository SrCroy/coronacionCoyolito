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
}
