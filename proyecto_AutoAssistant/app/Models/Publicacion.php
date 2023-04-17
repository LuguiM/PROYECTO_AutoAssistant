<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'marca_id',
        'modelo_id',
        'ano_id',
    ];

    public function marcas()
    {
        return $this->belongsToMany(Marca::class);
    }

    public function modelos()
    {
        return $this->belongsToMany(Modelo::class);
    }

    public function anios()
    {
        return $this->belongsToMany(Anio::class);
    }
}
