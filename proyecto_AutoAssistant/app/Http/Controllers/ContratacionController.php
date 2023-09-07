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

    public function index()
    {
        $contrataciones = Contratacion::all();
        return view('contrataciones.index', compact('contrataciones'));
    }

    public function create(Request $request, $id)
    {
        $conductor = Auth::user()->name;
        $servicioMecanico = ServicioMecanico::find($id);

        if (!$servicioMecanico) {
            dd('El servicio mecánico no existe.'); // Mensaje en la consola
        }

        return view('serviciosMecanicos.contratar', compact('servicioMecanico', 'conductor'));
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fecha' => ['required', 'date'],
        ], [
            'required' => 'El campo es obligatorio.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $conductor = Auth::user()->name;
        $conductor_id = Auth::id();
        $servicio_id = null;
        $mecanico_id = null;
    
        $id = intval($request->route('id'));
        $servicioMecanicoActivo = ServicioMecanico::find($id);
    
        if ($servicioMecanicoActivo) {
            $servicio_id = $servicioMecanicoActivo->id;
            $mecanico_id = $servicioMecanicoActivo->id_user;
            $servicio = $servicioMecanicoActivo->servicios;
            $tipoServicio = $servicioMecanicoActivo->tipoServicio;
        } else {
            return redirect()->back()->with('error', 'El servicio mecánico no existe.');
        }
    
        // Verificar si ya existe una contratación en la misma fecha y hora
        $existingContratacion = Contratacion::where('fecha', $request->fecha)
            ->where('mecanico_id', $mecanico_id)
            ->whereTime('created_at', '>=', now()->subHours(1)) // Cambiar 1 a la cantidad de horas que desees
            ->exists();
    
        if ($existingContratacion) {
            return redirect()->back()->withInput()->with('error', 'Ya existe una contratación en la misma fecha y hora.');
        }
    
        $contratacion = new Contratacion();
    
        $contratacion->fill([
            'conductorName' => $conductor,
            'servicioContratado' => $servicio,
            'fecha' => $request['fecha'],
            'tipoServicio' => $tipoServicio,
            'servicio_id' => $servicio_id,
            'conductor_id' => $conductor_id,
            'mecanico_id' => $mecanico_id
        ]);
    
        if ($contratacion->save()) {
            return redirect()->route('contrataciones.index')->with('success', 'SERVICIO MECÁNICO CONTRATADO.');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error al guardar el Servicio Mecánico. Por favor, inténtalo nuevamente.');
        }
    }

    public function edit($id)
    {
        $contratacion = Contratacion::find($id);

        if (!$contratacion) {
            return redirect()->route('contrataciones.index')->with('error', 'El servicio mecánico no existe.');
        }

        if ($contratacion->conductor_id != Auth::id()) {
            return redirect()->route('contrataciones.index')->with('error', 'No tienes permiso para editar este servicio mecánico.');
        }

        return view('contrataciones.edit', compact('contratacion'));
    }

    public function update(Request $request, Contratacion $contratacion, $id)
    {
        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'tipoServicio' => 'required|in:Adomicilio,Cita/Reserva',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $servicio = $contratacion::findOrFail($id);

        $servicio->fecha = $request->input('fecha');
        $servicio->tipoServicio = $request->input('tipoServicio');
        $servicio->save();

        return redirect()->route('contrataciones.index')->with('success', 'Servicio actualizado correctamente.');
    }

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