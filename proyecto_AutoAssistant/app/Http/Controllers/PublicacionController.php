<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicacion;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Anio;
use App\Models\PublicacionAnio;


class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = Publicacion::with('anios')->orderBy('created_at', 'desc')->get();
        /*
        $marcas = Marca::all();
        $modelos = Modelo::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos'));*/
        return view('publicacion.index', compact('publicacion'));
    }

    public function create()
    {
        /*
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();
        
        return view('publicaciones.create', compact('marcas', 'modelos', 'anios'));*/

        return view('publicacion.create');
    }

    public function store(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'titulo' => 'required',
        'descripcion' => 'required',
        'solucion' => 'required',
        'marca_id' => 'required',
        'modelo_id' => 'required',
        'anios' => 'required|array|min:1',
        'anios.*' => 'exists:anios,id',
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
    $publicacion->imagen = $imagen_path;
   

    $publicacion->save();

    $anios = $request->input('anios',[]);
    $publicacion->anios()->attach($anios);

    return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente.');
}


public function show($id)
{
    $publicacion = Publicacion::with('anios')->find($id);
    $recomendaciones = Publicacion::whereHas('anios', function ($query) use ($publicacion) {
        $query->whereIn('anio_id', $publicacion->anios->pluck('id')->toArray());
    })->where('id', '!=', $publicacion->id)
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
            ->when($request->anio_texto, function ($query, $anio_texto) {
                return $query->whereHas('publicacionAnios', function ($query) use ($anio_texto) {
                    $query->where('anio', 'LIKE', '%' . $anio_texto . '%');
                });
            })
            
            ->get();
        
        

        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

       

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios'));
    }


    

}

