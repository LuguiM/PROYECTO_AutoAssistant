<?php

namespace App\Http\Controllers;

use App\Models\ServicioMecanico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class ServicioMecanicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $user = auth()->user();
        $rolesUsuario = $user->getRoleNames();

        if($rolesUsuario->contains('taller_mecanico') || $rolesUsuario->contains('mecanico_independiente')){
            $serviciosMecanicos = ServicioMecanico::all();
            return view('serviciosMecanicos.requisitos', compact('serviciosMecanicos'));
        }elseif($rolesUsuario->contains('conductor') || $rolesUsuario->contains('futuro_conductor')){
            $serviciosMecanicos = ServicioMecanico::all();
            
            return view('serviciosMecanicos.servicioM', compact('serviciosMecanicos'));
        }else{
            return view('error');
        }
        
        
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
        /*try{*/
            $validator = Validator::make($request->all(),[
                'nombreTaller' => ['nullable', 'string', 'max:225'],
                'representante' => ['required', 'string', 'max:225'],
                'horario' => ['required', 'string', 'max:225'],
                'numeroContacto' => ['required', 'numeric', 'digits_between:8,15'],
                'logo' => ['required', 'image', 'max:2048'],
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
       /* }catch (\Exception $e) {
            // Error en el servidor o problemas de conexión a Internet
            return redirect()->back()->with('error', 'Ha ocurrido un error en el servidor. Por favor, inténtalo nuevamente más tarde.');
        }*/
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $servicioMecanico = ServicioMecanico::find($id);
    
        // Verificar si el servicio mecánico existe
        if (!$servicioMecanico) {
            return redirect()->back()->with('error', 'El servicio mecánico no existe.');
        }

        $conductor = Auth::user()->name;

        $datosFormulario = [
            'servicios' => $servicioMecanico->servicios,
            'conductor' => $conductor,
            // Agrega aquí más campos que desees cargar automáticamente
        ];

        return view('serviciosMecanicos.show', compact('servicioMecanico','datosFormulario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicioMecanico = ServicioMecanico::find($id);
    
        // Verificar si el servicio mecánico existe
        if (!$servicioMecanico) {
            return redirect()->route('servicios-mecanicos.index')->with('error', 'El servicio mecánico no existe.');
        }
        
        // Verificar si el servicio mecánico pertenece al usuario actual
        if ($servicioMecanico->id_user != Auth::id()) {
            return redirect()->route('servicios-mecanicos.index')->with('error', 'No tienes permiso para editar este servicio mecánico.');
        }
        
        
        return view('serviciosMecanicos.edit', compact('servicioMecanico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicioMecanico $servicioMecanico, $id)
    {
       
    // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'representante' => 'required',
            'horario' => 'required',
            'numeroContacto' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
            'rubro' => 'required',
            'servicio' => 'required',
            'direccion' => 'required',
            'acreditacion_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'acreditacion_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'acreditacion_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'acreditacion_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener el servicio a actualizar
        $servicio = $servicioMecanico::findOrFail($id);

        // Actualizar los campos del servicio con los datos del formulario
        $servicio->representante = $request->input('representante');
        $servicio->horario = $request->input('horario');
        $servicio->numeroContacto = $request->input('numeroContacto');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->rubro = $request->input('rubro');
        $servicio->servicios = $request->input('servicio');
        $servicio->direccion = $request->input('direccion');

        // Subir las acreditaciones si se proporcionaron

        if ($request->hasFile('logo')) {
            $logos = $request->file('logo');
            // Guardar el archivo y obtener su ruta
            $rutalogos = $logos->store('acreditaciones');
            $servicio->logo = $rutalogos;
        }

        if ($request->hasFile('acreditacion_1')) {
            $acreditaciones = $request->file('acreditacion_1');
            // Guardar el archivo y obtener su ruta
            $rutaAcreditaciones = $acreditaciones->store('acreditacion_1');
            $servicio->acreditacion_1 = $rutaAcreditaciones;
        }

        if ($request->hasFile('acreditacion_2')) {
            $acreditaciones2 = $request->file('acreditacion_2');
            $rutaAcreditaciones2 = $acreditaciones2->store('acreditacion_2');
            $servicio->acreditacion_2 = $rutaAcreditaciones2;
        }

        if ($request->hasFile('acreditacion_3')) {
            $acreditaciones3 = $request->file('acreditacion_3');
            $rutaAcreditaciones3 = $acreditaciones3->store('acreditacion_3');
            $servicio->acreditacion_3 = $rutaAcreditaciones3;
        }

        if ($request->hasFile('acreditacion_4')) {
            $acreditaciones4 = $request->file('acreditacion_4');
            $rutaAcreditaciones4 = $acreditaciones4->store('acreditacion_');
            $servicio->acreditacion_4 = $rutaAcreditaciones4;
        }

        // Guardar los cambios en el servicio
        $servicio->save();

        // Redireccionar a la página de visualización del servicio actualizado
        return redirect()->route('servicios-mecanicos.index')->with('success', 'El servicio se ha actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicioMecanico $servicioMecanico, $id)
    {
        $servicioMecanico = ServicioMecanico::find($id);

        if (!$servicioMecanico) {
            // Si el servicio mecánico no existe, puedes mostrar un mensaje de error o redirigir a una página de error.
            // Por ejemplo:
            return redirect()->route('servicios-mecanicos.index')->with('error', 'El servicio mecánico no existe.');
        }
    
        // Eliminar los campos relacionados con el servicio mecánico de la base de datos
        $servicioMecanico->delete();
    
        // Redirigir a la página de índice de servicios mecánicos con un mensaje de éxito
        return redirect()->route('servicios-mecanicos.index')->with('success', 'El servicio mecánico ha sido eliminado correctamente.');
    }

    public function buscarServicio(Request $request)
    {
        // Obtén los rubros seleccionados del formulario de búsqueda
        $rubros = $request->input('rubro');

        // Consulta los servicios mecánicos que coincidan con los rubros seleccionados
        $serviciosMecanicos = ServicioMecanico::whereIn('rubro', $rubros)->get();

        // Retorna los resultados de la búsqueda en formato JSON
        return response()->json($serviciosMecanicos);
    }
    

}
