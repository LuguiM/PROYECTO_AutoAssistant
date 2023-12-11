<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cultura;


class culturaController extends Controller
{

public function create()
{
    return view('cultura.index1');
}

public function store(Request $request)
{
    $data = $request->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
        'imagen1' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    $imagen1Path = $request->file('imagen1')->store('uploads', 'public');

    Cultura::create([
        'titulo' => $data['titulo'],
        'descripcion' => $data['descripcion'],
        'imagen1' => $imagen1Path,
    ]);

    return redirect()->route('cultura.index1')->with('success', 'Registro creado con éxito');
}

public function index()
{
    $culturas = Cultura::all();
    return view('cultura.index', compact('culturas'));
}
}