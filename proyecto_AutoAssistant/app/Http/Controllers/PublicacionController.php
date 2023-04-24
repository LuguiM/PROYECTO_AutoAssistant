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
        'solucion' => 'required',
        'marca_id' => 'required',
        'modelo_id' => 'required',
        'anio_id' => 'required',
        'imagen' => 'required|image|max:2048'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $imagen = $request->file('imagen');
    $imagen_path = 'imagenes/' . time() . '.' . $imagen->getClientOriginalExtension();
    $imagen->move(public_path('imagenes'), $imagen_path);

    $publicacion = new Publicacion();
    $publicacion->titulo = $request->input('titulo');
    $publicacion->descripcion = $request->input('descripcion');
    $publicacion->solucion = $request->input('solucion');
    $publicacion->marca_id = $request->input('marca_id');
    $publicacion->modelo_id = $request->input('modelo_id');
    $publicacion->anio_id = $request->input('anio_id');
    $publicacion->imagen = $imagen_path;
    $publicacion->save();

    return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente.');
}


    public function show( $id)
    {
        $publicacion = Publicacion::find($id);
        $recomendaciones = Publicacion::where('marca_id', '=', $publicacion->marca_id)
                                        ->orWhere('modelo_id', '=', $publicacion->modelo_id)
                                        ->orWhere('anio_id', '=', $publicacion->anio_id)
                                        ->where('id', '!=', $publicacion->id) // Excluimos la publicación actual
                                        ->limit(4)
                                        ->get();
        return view('publicaciones.show', compact('publicacion', 'recomendaciones'));
    }

    public function buscar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q' => 'nullable|string|max:255',
            'marca' => 'nullable|exists:marcas,id',
            'modelo' => 'nullable|exists:modelos,id',
            'anio' => 'nullable|exists:anios,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publicaciones = Publicacion::when($request->q, function ($query, $q) {
                return $query->where('titulo', 'LIKE', '%'.$q.'%');
            })
            ->when($request->marca, function ($query, $marca) {
                return $query->where('marca_id', $marca);
            })
            ->when($request->modelo, function ($query, $modelo) {
                return $query->where('modelo_id', $modelo);
            })
            ->when($request->anio, function ($query, $anio) {
                return $query->where('anio_id', $anio);
            })
            ->get();
        
        

        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios'));
    }


    

}

