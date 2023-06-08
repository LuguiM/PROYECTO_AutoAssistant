<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratacion extends Model
{
    use HasFactory;
    protected $table = 'contrataciones';

    protected $fillable = [
        'conductorName',
        'servicioContratado',
        'fecha',
        'tipoServicio',
        'servicio_id',
        'conductor_id',
        'mecanico_id',

    ];

    public function servicioMecanico()
    {
        return $this->belongsTo(ServicioMecanico::class, 'servicio_id');
    }

}
