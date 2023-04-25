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
            ->when($request->marca_texto, function ($query, $marca_texto) {
                $marca = Marca::where('nombre', 'LIKE', '%' . $marca_texto . '%')->first();
                if($marca){
                    return $query->where('marca_id', $marca->id);
                }
                
            })
            ->when($request->modelo_texto, function ($query, $modelo_texto) {
                $modelo = Modelo::where('nombre', 'LIKE', '%' . $modelo_texto . '%')->first();
                if($modelo){
                    return $query->where('modelo_id', $modelo->id);
                }
            })
            ->when($request->anio_texto, function ($query, $anio_texto) {
                $anio = Anio::where('anio', 'LIKE', '%' . $anio_texto . '%')->first();
                if($anio){
                    return $query->where('modelo_id', $anio->id);
                }
            })
            ->get();
        
        

        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios'));
    }


    

}

