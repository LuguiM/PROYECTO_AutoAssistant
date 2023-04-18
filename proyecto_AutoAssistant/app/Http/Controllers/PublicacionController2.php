<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Anio;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = Publicacion::with('marca', 'modelo', 'anio')->orderBy('created_at', 'DESC')->paginate(10);

        $marcas = Marca::all();
        $modelos = Modelo::all();
        $anios = Anio::all();

        $marca_id = $request->input('marca_id');
        $modelo_id = $request->input('modelo_id');
        $anio_id = $request->input('anio_id');
        $titulo = $request->input('titulo');

        if (!empty($marca_id)) {
            $publicaciones = $publicaciones->where('marca_id', $marca_id);
        }

        if (!empty($modelo_id)) {
            $publicaciones = $publicaciones->where('modelo_id', $modelo_id);
        }

        if (!empty($anio_id)) {
            $publicaciones = $publicaciones->where('anio_id', $anio_id);
        }

        if (!empty($titulo)) {
            $publicaciones = $publicaciones->where('titulo', 'like', '%'.$titulo.'%');
        }

        return view('publicaciones.index', compact('publicaciones', 'marcas', 'modelos', 'anios', 'marca_id', 'modelo_id', 'anio_id', 'titulo'));
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
        //dd($request->all());
         // Validar los datos del formulario
         $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'ano_id' => 'required|exists:anos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subir la imagen al servidor
        //$imagen = $request->file('imagen')->store('public');
        $imagen = file_get_contents($request->file('imagen')->getRealPath());
        
        // Crear la publicación y asignarle los valores recibidos
        $publicacion = new Publicacion();
        $publicacion->titulo = $validatedData['titulo'];
        $publicacion->descripcion = $validatedData['descripcion'];
        $publicacion->marca_id = $validatedData['marca_id'];
        $publicacion->modelo_id = $validatedData['modelo_id'];
        $publicacion->ano_id = $validatedData['ano_id'];
        $publicacion->imagen = $imagen;

        // Guardar la publicación en la base de datos
        $publicacion->save();
        

        // Redirigir al usuario a la página de inicio con un mensaje de éxito
        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente.');
        //return redirect()->route('publicaciones.index');
        //return redirect('/publicacion')->with('success', 'Publicación creada correctamente.');
    }

    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', compact('publicacion'));
    }

    public function buscar(Request $request)
    {
        $titulo = $request->input('titulo');
        $marca_id = $request->input('marca');
        $modelo_id = $request->input('modelo');
        $anio_id = $request->input('anio');
    
        $publicaciones = Publicacion::where('titulo', 'like', "%$titulo%");
    
        if ($marca_id) {
            $publicaciones->where('marca_id', $marca_id);
        }
    
        if ($modelo_id) {
            $publicaciones->where('modelo_id', $modelo_id);
        }
    
        if ($anio_id) {
            $publicaciones->where('anio_id', $anio_id);
        }
    
        $publicaciones = $publicaciones->paginate(10);
    
        return view('publicaciones.index', compact('publicaciones'));
    }

}

