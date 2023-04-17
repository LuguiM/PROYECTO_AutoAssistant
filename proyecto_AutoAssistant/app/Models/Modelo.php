<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
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


}
