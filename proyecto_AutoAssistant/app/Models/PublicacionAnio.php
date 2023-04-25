<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicacionAnio extends Model
{
    protected $table = 'publicacion_anio';

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }

    public function anios()
    {
        return $this->belongsToMany(Anio::class);
    }
}
