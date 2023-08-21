<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        
    ];

    public function publicacion()
    {
        return $this->belongsToMany(Publicacion::class);
    }
    public function modelo()
    {
        return $this->hasMany(Modelo::class);
    }

}
