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
use Illuminate\Support\Facades\Route;
use App\Models\ServicioMecanico; 



class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = Publicacion::All();//->orderBy('created_at', 'desc')->get();
        /*
        $marcas = Marca::all();
        $modelos = Modelo::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos'));*/
        return view('publicaciones.index', compact('publicaciones'));
    }


    public function create()
    {
        /*
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();
        
        return view('publicaciones.create', compact('marcas', 'modelos', 'anios'));*/

        return view('publicaciones.create');
    }

    public function store(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'titulo' => 'required',
        'descripcion' => 'required',
        'solucion' => 'required',
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
    $publicacion->imagen = $imagen_path;
   

    $publicacion->save();

    return redirect()->route('publicaciones.create')->with('success', 'Piloto creada correctamente.');
}


public function show($id)
{
    //$publicacion = Publicacion::with('anios')->find($id);
    $publicacion = Publicacion::find($id);

    // Obtener el nombre de la ruta actual
    $currentRoute = Route::currentRouteName();

    // Determinar qué vista está siendo accedida y retornar en consecuencia
    if ($currentRoute === 'publicaciones.show') {
        return view('publicaciones.show', compact('publicacion'));
    } elseif ($currentRoute === 'publicaciones.show1') {
        return view('publicaciones.info', compact('publicacion'));
    }

    // En caso de que la ruta no coincida con ninguna de las vistas esperadas
    // podrías lanzar una excepción o manejarlo de acuerdo a tus necesidades.
}




public function buscar(Request $request)
{
    $validator = Validator::make($request->all(), [
        'q' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $publicaciones = Publicacion::when($request->q, function ($query, $q) {
            return $query->where('titulo', 'LIKE', '%'.$q.'%');
        })->get();

    // Obtener el nombre de la ruta actual
    $currentRoute = Route::currentRouteName();
    //dd("Current Route: " . $currentRoute);

    // Determinar qué vista está siendo accedida y retornar en consecuencia
    if ($currentRoute === 'publicaciones.buscar') {
        return view('publicaciones.index', compact('publicaciones'));
    } elseif ($currentRoute === 'publicaciones.busscar') {
        return view('serviciosMecanicos.otraVista', compact('publicaciones'));
    }
    
    // En caso de que la ruta no coincida con ninguna de las vistas esperadas
    // podrías lanzar una excepción o manejarlo de acuerdo a tus necesidades.
}

    public function otraVista(Request $request)
    {
        $publicaciones = Publicacion::All(); // Obtén las mismas publicaciones nuevamente
        return view('serviciosMecanicos.otraVista', compact('publicaciones'));
    }

   
    
}



