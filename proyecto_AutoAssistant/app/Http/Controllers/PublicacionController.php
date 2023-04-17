<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Ano;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = Publicacion::query();

        // Filtrar por marca, modelo y año
        if ($request->has('marca')) {
            $publicaciones->whereHas('marca', function ($query) use ($request) {
                $query->where('id', $request->marca);
            });
        }

        if ($request->has('modelo')) {
            $publicaciones->whereHas('modelos', function ($query) use ($request) {
                $query->whereIn('id', $request->modelo);
            });
        }

        if ($request->has('ano')) {
            $publicaciones->whereHas('anos', function ($query) use ($request) {
                $query->whereIn('id', $request->ano);
            });
        }

        // Ordenar por fecha de creación descendente
        $publicaciones->latest();

        // Paginación
        $publicaciones = $publicaciones->paginate(9);

        // Obtener marcas, modelos y años para el filtro
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anos = Ano::all();

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anos = Ano::all();

        return view('publicaciones.create', compact('marcas', 'modelos', 'anos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'ano_id' => 'required',
        ]);
    
        $publicacion = new Publicacion();
        $publicacion->titulo = $request->input('titulo');
        $publicacion->descripcion = $request->input('descripcion');
        $publicacion->marca_id = $request->input('marca_id');
        $publicacion->modelo_id = $request->input('modelo_id');
        $publicacion->ano_id = $request->input('ano_id');
        
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images');
            $image->move($path, $imageName);
            $publicacion->imagen = $imageName;
        }
    
        $publicacion->save();
    
        //return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente');
        // Guardar la publicación
        //$publicacion->save();

        // Agregar sesión flash
        session()->flash('mensaje', 'La publicación se ha creado correctamente.');

        // Redireccionar a la página de publicaciones
        return redirect()->route('publicaciones.index');
    }

    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', compact('publicacion'));
    }

    public function buscar(Request $request)
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anos = Ano::all();

        $publicaciones = Publicacion::query();

        if ($request->has('marca')) {
            $publicaciones->where('marca_id', $request->input('marca'));
        }

        if ($request->has('modelo')) {
            $publicaciones->where('modelo_id', $request->input('modelo'));
        }

        if ($request->has('ano')) {
            $publicaciones->where('ano_id', $request->input('ano'));
        }

        if ($request->has('titulo')) {
            $publicaciones->where('titulo', 'LIKE', '%' . $request->input('titulo') . '%');
        }

        $publicaciones = $publicaciones->paginate(10);

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anos'));
    }

}

