<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    public function index()
    {
        // Obtener datos de ejemplo
        $serviciosMecanicos = [
            0 => [
                'id' => 1,
                'representante' => 'Taller Mecánico Ejemplo', 
                'rubro' => 'Mecánico',
                // etc...
            ],
            // más servicios de ejemplo
        ];

        return view('ServiciosSitio', [
            'serviciosMecanicos' => $serviciosMecanicos 
        ]);
    }

    public function show($id) 
    {
        // Obtener un servicio por su id
        $servicio = [
            'id' => $id,
            'representante' => 'Taller Mecánico Ejemplo',
           // etc...
        ];
        
        return view('ServiciosSitioDetalle', [
            'servicio' => $servicio
        ]);
    }

}