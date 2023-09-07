<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioMecanico extends Model
{
    use HasFactory;
    protected $table = 'servicios_mecanicos';

    protected $fillable = [
        'nombreTaller',
        'representante',
        'fechaInicio',
        'fechaFin',
        'numeroContacto',
        'precio',
        'hora1',
        'hora2',
        'logo',
        'rubro',
        'servicios',
        'descripcion',
        'direccion',
        'tipoServicio',
        'acreditacion_1',
        'acreditacion_2',
        'acreditacion_3',
        'acreditacion_4',
        'id_user',

    ];

    public function contrataciones()
    {
        return $this->hasMany(Contratacion::class);
    }

}