<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrataciones2 extends Model
{
    use HasFactory;
    protected $table = 'servicios_mecanicos_p';
    protected $fillable = [
        
        'horarioatencion',
        'logo',
        'rubro',
        'servicios',
        'descripcion',
        'direccion',
        'tipodeservicio',
        'img1',
        'img2',
        'img3',
        'img4',
        'id_perfil',

    ];

    // Define las relaciones y métodos adicionales aquí
}