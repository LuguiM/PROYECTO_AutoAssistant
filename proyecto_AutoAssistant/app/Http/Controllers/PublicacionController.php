<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicacion;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Anio;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = Publicacion::orderBy('created_at', 'desc')->get();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();
        
        return view('publicaciones.create', compact('marcas', 'modelos', 'anios'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'anio_id' => 'required',
            'imagen' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagen = $request->file('imagen');
        $imagen_path = $imagen->store('publicaciones', 'public');

        $publicacion = new Publicacion();
        $publicacion->titulo = $request->input('titulo');
        $publicacion->descripcion = $request->input('descripcion');
        $publicacion->marca_id = $request->input('marca_id');
        $publicacion->modelo_id = $request->input('modelo_id');
        $publicacion->anio_id = $request->input('anio_id');
        $publicacion->imagen = $imagen_path;
        $publicacion->save();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente.');
    }

    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', compact('publicacion'));
    }

    public function buscar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'anio_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publicaciones = Publicacion::where('marca_id', $request->marca_id)
            ->where('modelo_id', $request->modelo_id)
            ->where('anio_id', $request->anio_id)
            ->get();

        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios'));
    }
}

