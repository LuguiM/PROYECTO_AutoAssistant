<?php

namespace App\Http\Controllers;

use App\Models\ServicioMecanico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServicioMecanicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('serviciosMecanicos.requisitos');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('serviciosMecanicos.inscripcion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'nombreTaller' => ['nullable', 'string', 'max:225'],
                'representante' => ['required', 'string', 'max:225'],
                'horario' => ['required', 'string', 'max:225'],
                'numeroContacto' => ['required', 'numeric', 'digits_between:8,15'],
                'logo' => ['required', 'image', 'logo', 'max:2048'],
                'rubro' => ['required', 'string', 'max:255'],
                'servicio' => ['required', 'string', 'max:225'],
                'descripcion' => ['required', 'string', 'max:1000'],
                'direccion' => ['nullable', 'string', 'max:225'],
                'tipoServicio' => ['required', 'string', 'max:225'],
                'acreditacion_1' => ['nullable', 'image', 'max:2048'],
                'acreditacion_2' => ['nullable', 'image', 'max:2048'],
                'acreditacion_3' => ['nullable', 'image', 'max:2048'],
                'acreditacion_4' => ['nullable', 'image', 'max:2048'],
            ], [
                'required' => 'El campo :attribute es obligatorio.',
                'numeric' => 'El campo :attribute debe ser un número.',
                'logo.required' =>'La imagen es requerida'
            ]);

            if ($validator->fails()) {
                // Mostrar los mensajes de error y manejarlos adecuadamente
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $id_user = Auth::id();

            $logo = $request->file('logo');
            $acreditacion_1 = $request->file('acreditacion_1');
            $acreditacion_2 = $request->file('acreditacion_2');
            $acreditacion_3 = $request->file('acreditacion_3');
            $acreditacion_4 = $request->file('acreditacion_4');

            $logo_path = null;
            $acreditacion_1_path = null;
            $acreditacion_2_path = null;
            $acreditacion_3_path = null;
            $acreditacion_4_path = null;


            if ($logo) {
                $logo_path = 'imagenes/serviciosMecanicos/logo/' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('imagenes/serviciosMecanicos/logo'), $logo_path);
            }

            if ($acreditacion_1) {
                $acreditacion_1_path = 'imagenes/serviciosMecanicos/acreditacion_1/' . time() . '.' . $acreditacion_1->getClientOriginalExtension();
                $acreditacion_1->move(public_path('imagenes/serviciosMecanicos/acreditacion_1'), $acreditacion_1_path);
            }

            if ($acreditacion_2) {
                $acreditacion_2_path = 'imagenes/serviciosMecanicos/acreditacion_2/' . time() . '.' . $acreditacion_2->getClientOriginalExtension();
                $acreditacion_2->move(public_path('imagenes/serviciosMecanicos/acreditacion_2'), $acreditacion_2_path);
            }

            if ($acreditacion_3) {
                $acreditacion_3_path = 'imagenes/serviciosMecanicos/acreditacion_3/' . time() . '.' . $acreditacion_3->getClientOriginalExtension();
                $acreditacion_3->move(public_path('imagenes/serviciosMecanicos/acreditacion_3'), $acreditacion_3_path);
            }

            if ($acreditacion_4) {
                $acreditacion_4_path = 'imagenes/serviciosMecanicos/acreditacion_4/' . time() . '.' . $acreditacion_4->getClientOriginalExtension();
                $acreditacion_4->move(public_path('imagenes/serviciosMecanicos/acreditacion_4'), $acreditacion_4_path);
            }

            $servicio = new ServicioMecanico([
                'nombreTaller' => $request->nombreTaller,
                'representante' => $request->representante,
                'horario' => $request->horario,
                'numeroContacto' => $request->numeroContacto,
                'logo' => $logo_path,
                'rubro' => $request->rubro,
                'servicio' => $request->servicio,
                'descripcion' => $request->descripcion,
                'direccion' => $request->direccion,
                'tipoServicio' => $request->tipoServicio,
                'acreditacion_1' => $acreditacion_1_path,
                'acreditacion_2' => $acreditacion_2_path,
                'acreditacion_3' => $acreditacion_3_path,
                'acreditacion_4' => $acreditacion_4_path,
                'id_user' => $id_user,
            ]);

            if ($servicio->save()) {
                // El modelo se guardó correctamente
                return redirect()->route('servicios-mecanicos.index')->with('success', 'Servicio Mecanico creado correctamente.');
            } else {
                // Error al guardar el modelo
                return redirect()->back()->with('error', 'Ha ocurrido un error al guardar el Servicio Mecanico. Por favor, inténtalo nuevamente.');
            }
        }catch (\Exception $e) {
            // Error en el servidor o problemas de conexión a Internet
            return redirect()->back()->with('error', 'Ha ocurrido un error en el servidor. Por favor, inténtalo nuevamente más tarde.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ServicioMecanico $servicioMecanico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicioMecanico $servicioMecanico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicioMecanico $servicioMecanico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicioMecanico $servicioMecanico)
    {
        //
    }
}
