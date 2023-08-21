<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'anio',
        
    ];

    public function publicacion()
    {
        return $this->belongsToMany(Publicacion::class, 'publicacion_anio');
    }
    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'anio_publicacion');
    }
}
