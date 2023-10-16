<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TuController extends Controller {
    public function perfilusu1() {
        return view('perfilusu');
    }

    public function guardarDatos(Request $request) {
        // Aquí puedes validar y guardar los datos en la base de datos
        // Usa $request->input('nombre_del_campo') para acceder a los valores
        // Puedes utilizar el modelo Eloquent para guardar los datos en la tabla MySQL
    }
}