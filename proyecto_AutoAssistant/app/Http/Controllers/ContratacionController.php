<?php

namespace App\Http\Controllers;
use App\Models\Contratacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ServicioMecanico;
use Illuminate\Validation\Rule;


class ContratacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrataciones = Contratacion::all();
        return view('contrataciones.index', compact('contrataciones'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        
        $conductor = Auth::user()->name;
        // Obtener el objeto del servicio mecánico utilizando el ID
        $servicioMecanico = ServicioMecanico::find($id);
    
        // Verificar si el servicio mecánico existe
        if (!$servicioMecanico) {
            dd('El servicio mecánico no existe.'); // Mensaje en la consola
        }
    
        // Resto de la lógica del controlador
    
        return view('serviciosMecanicos.contratar', compact('servicioMecanico', 'conductor'));
    }
    

    /**
     *aquixs
     */
    public function store(Request $request, $id)
    {
       
        $validator= Validator::make($request->all(),[
            
            'fecha' => ['required', 'date'],
        ],[
            'required' => 'El campo es obligatorio.'
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        $conductor = Auth::user()->name; 
        $conductor_id = Auth::id();

        $servicio_id = null;
        $mecanico_id = null;

        $id =  intval($request->route('id'));
        $servicioMecanicoActivo = ServicioMecanico::find($id);
       

        if ($servicioMecanicoActivo) {
            // Se encontró el servicio mecánico activo
            $servicio_id = $servicioMecanicoActivo->id;
            $mecanico_id = $servicioMecanicoActivo->id_user;
            $servicio = $servicioMecanicoActivo->servicios;
            $tipoServicio = $servicioMecanicoActivo->tipoServicio;
        
            // Resto del código para guardar la Contratación
            // ...
        } else {
            // No se encontró el servicio mecánico activo
            // Puedes mostrar un mensaje de error o redirigir a otra página
        }
      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
    $user = Auth::user();
    $conductorId = $user->id;

    // Check if the logged-in user already has a contratación with the same name
    $existingContratacion = Contratacion::where('conductor_id', $conductorId)
                                        ->where('servicioContratado', $servicio)
                                        ->exists();

    if ($existingContratacion) {
        return redirect()->back()->withInput()->with('error', 'Ya tienes una contratación con el mismo servicio.');
    }
        $existingContratacion = Contratacion::where('fecha', $request->fecha)
        ->where('mecanico_id', $mecanico_id)
        ->exists();

if ($existingContratacion) {
return redirect()->back()->withInput()->with('error', 'Ya existe una contratación en la misma fecha.');
}

        $contratacion = new Contratacion();
        
        $contratacion->fill([
            'conductorName' => $conductor,
            'servicioContratado' => $servicio,
            'fecha' => $request['fecha'],
            'tipoServicio' =>$tipoServicio,
            'servicio_id' => $servicio_id,
            'conductor_id' => $conductor_id,
            'mecanico_id' => $mecanico_id
        ]);
        //dd($contratacion);

        if ($contratacion->save()) {
            // El modelo se guardó correctamente
            return redirect()->route('contrataciones.index')->with('success', 'SERVICIO MECANICO CONTRATADO.');
        } else {
            // Error al guardar el modelo
            return redirect()->back()->with('error', 'Ha ocurrido un error al guardar el Servicio Mecanico. Por favor, inténtalo nuevamente.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contratacion = Contratacion::find($id);

        // Verificar si el servicio mecánico existe
        if (!$contratacion) {
            return redirect()->route('contrataciones.index')->with('error', 'El servicio mecánico no existe.');
        }
        
        // Verificar si el servicio mecánico pertenece al usuario actual
        if ($contratacion->conductor_id != Auth::id()) {
            return redirect()->route('contrataciones.index')->with('error', 'No tienes permiso para editar este servicio mecánico.');
        }
        
        
        return view('contrataciones.edit', compact('contratacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contratacion $contratacion ,$id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(),[
            'fecha' => 'required|date',
            'tipoServicio' => 'required|in:Adomicilio,Cita/Reserva',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $servicio = $contratacion::findOrFail($id);

        // Actualizar los campos de la contratación
        $servicio->fecha = $request->input('fecha');
        $servicio->tipoServicio = $request->input('tipoServicio');
        $servicio->save();

        //return redirect()->back()->with('success', 'Servicio actualizado correctamente.');
        return redirect()->route('contrataciones.index')->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contratacion = Contratacion::find($id);

        if (!$contratacion) {
            return redirect()->route('contrataciones.index')->with('error', 'El servicio no existe.');
        }

        $contratacion->delete();

        return redirect()->route('contrataciones.index')->with('success', 'El servicio ha sido eliminado correctamente.');
    }
}