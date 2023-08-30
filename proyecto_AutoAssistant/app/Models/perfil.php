<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfil';
    protected $fillable = [
        
        
        'logo',
        'dirreccio',
        'rubro',
        'numerocontacto',
        'id_user',
        // Agrega aquí los demás campos necesarios para el perfil
    ];

    // Define las relaciones y métodos adicionales aquí
}