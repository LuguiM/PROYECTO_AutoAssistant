<?php

namespace App\Http\Controllers;
use App\Models\Contratacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ServicioMecanico;


class ContratacionController extends Controller
{
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
    public function create()
    {
        return view('contrataciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'fecha' => ['required', 'date'],
            'tipoServicio' => ['required', 'string', 'max:225'],
        ],[
            'required' => 'El campo :atribute es obligatorio.'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $conductor_id = Auth::id();

        $servicio_id = null;
        $mecanico_id = null;

        $id =  intval($request->route('id'));
        $servicioMecanicoActivo = ServicioMecanico::find($id);

        if ($servicioMecanicoActivo) {
            // Se encontró el servicio mecánico activo
            $servicio_id = $servicioMecanicoActivo->id;
            $mecanico_id = $servicioMecanicoActivo->id_user;
        
            // Resto del código para guardar la Contratación
            // ...
        } else {
            // No se encontró el servicio mecánico activo
            // Puedes mostrar un mensaje de error o redirigir a otra página
        }

        $contratacion = new Contratacion([
            'conductorName' => $request['conductor'],
            'servicioContratado' => $request['servicios'],
            'fecha' => $request['fecha'],
            'tipoServicio' =>$request['tipoServicio'],
            'servicio_id' => $servicio_id,
            'conductor_id' => $conductor_id,
            'mecanico_id' => $mecanico_id
        ]);

        if ($contratacion->save()) {
            // El modelo se guardó correctamente
            return response()->json(['msg' => 'ok'], 200);
        } else {
            // Error al guardar el modelo
            return redirect()->back()->with('error', 'Ha ocurrido un error al guardar el Servicio Mecanico. Por favor, inténtalo nuevamente.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
