<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidatas extends Model
{
    protected $table = 'candidatas';

    protected $fillable = [
        'nombreCandidata',
        'apellidoCandidata',
        'fotoCandidata',
    ];

    public function escrutinio(){
        return $this->hasMany(Escrutinios::class, 'candidatas_id');
    }
}
