<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicacion';

    protected $fillable = [
        'titulo',
        'descripcion',
        'solucion',
        'imagen',
        
    ];
/*
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function anios()
    {   
        return $this->belongsToMany(Anio::class, 'publicacion_anio');
        //return $this->belongsTo(Anio::class);
    }
    public function publicacionAnios()
    {
        return $this->belongsToMany(Anio::class, 'publicacion_anio', 'publicacion_id', 'anio_id');
    }*/

}
