<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\ServicioMecanico;
use App\Models\Contratacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;


class ServicioMecanicoController extends Controller
{
  

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
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

        } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'No se pudo establecer una conexión con el servidor. Por favor, verifica tu conexión a internet y vuelve a intentarlo.');
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
                'fechaInicio' => ['required', 'string', 'max:225'],
                'fechaFin' => ['required', 'string', 'max:225'],
                'numeroContacto' => ['required', 'numeric', 'digits_between:8,15'],
                'precio' => ['required', 'numeric'],
                'hora1' => ['nullable', 'string', 'max:25'],
                'hora2' => ['nullable', 'string', 'max:25'],
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
            
            $hora1 = $request->input('fechaInicio');
             $hora2 = $request->input('fechaFin');
             $dias1 = $request->input('dayCombinations');
             $horario = $hora1.$hora2.$dias1; 

            $servicio = new ServicioMecanico([
                'nombreTaller' => $request->nombreTaller,
                'representante' => $request->representante,
                'fechaInicio' => $request->fechaInicio,
                'fechaFin' => $request->fechaFin,
                'numeroContacto' => $request->numeroContacto,
                'precio' => $request->precio,
                'hora1' => $request->hora1,
                'hora2' => $request->hora2,
                'logo' => $logo_path,
                'rubro' => $request->rubro,
                'servicios' => $request->servicio,
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

       } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'No se pudo establecer una conexión con el servidor. Por favor, verifica tu conexión a internet y vuelve a intentarlo.');
            return redirect()->back();
        }
       
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $servicioMecanico = ServicioMecanico::find($id);
        
            // Obtener el nombre de la ruta actual
    $currentRoute = Route::currentRouteName();

    
            // Verificar si el servicio mecánico existe
            if (!$servicioMecanico) {
                return redirect()->back()->with('error', 'El servicio mecánico no existe.');
            }else{
               
                // Determinar qué vista está siendo accedida y retornar en consecuencia
    if ($currentRoute === 'servicios-mecanicos.show') {
        return view('serviciosMecanicos.show', compact('servicioMecanico','id'));
    } elseif ($currentRoute === 'servicios-mecanicos.show1') {
        return view('serviciosMecanicos.vistaServicios', compact('servicioMecanico','id'));
    }
            }
        } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'No se pudo establecer una conexión con el servidor. Por favor, verifica tu conexión a internet y vuelve a intentarlo.');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
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
        } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'No se pudo establecer una conexión con el servidor. Por favor, verifica tu conexión a internet y vuelve a intentarlo.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      //  try {
            // Validar los datos del formulario
            $validator = Validator::make($request->all(), [
                'nombreTaller' =>'nullable',
                'representante' => 'nullable',
                'fechaInicio' => 'nullable',
                'fechaFin' => 'nullable',
                'numeroContacto' => 'nullable',
                'precio' => 'nullable',
                'hora1' => 'nullable',
                'hora2' => 'nullable',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'descripcion' => 'nullable',
                'rubro' => 'nullable',
                'servicio' => 'nullable',
                'direccion' => 'nullable',
                'tipoServicio' => 'nullable',
                'acreditacion_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $servicioMecanico = ServicioMecanico::All();
            // Obtener el servicio a actualizar
            $servicio = ServicioMecanico::find($id);
            
          

            // Actualizar los campos del servicio con los datos del formulario
            $servicio->nombreTaller = $request->input('nombreTaller');
            $servicio->representante = $request->input('representante');
            $servicio->fechaFin = $request->input('fechaFin');
            $servicio->fechaInicio = $request->input('fechaInicio');
            $servicio->precio = $request->input('precio');
            $servicio->hora1 = $request->input('hora1');
            $servicio->hora2 = $request->input('hora2');
            $servicio->numeroContacto = $request->input('numeroContacto');
            $servicio->descripcion = $request->input('descripcion');
            $servicio->rubro = $request->input('rubro');
            $servicio->servicio = $request->input('servicio');
            $servicio->direccion = $request->input('direccion');

            // Subir las acreditaciones si se proporcionaron
            $logo_path = null;
            $acreditacion_1_path = null;
            $acreditacion_2_path = null;
            $acreditacion_3_path = null;
            $acreditacion_4_path = null;
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logo_path = 'imagenes/serviciosMecanicos/logo/' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('imagenes/serviciosMecanicos/logo'), $logo_path);
                $servicio->logo = $logo_path;
            }

            if ($request->hasFile('acreditacion_1')) {
                $acreditaciones = $request->file('acreditacion_1');
                // Guardar el archivo y obtener su ruta
                //$rutaAcreditaciones = $acreditaciones->store('acreditacion_1');
                $acreditacion_1_path = 'imagenes/serviciosMecanicos/acreditacion_1/' . time() . '.' . $acreditaciones->getClientOriginalExtension();
                $acreditaciones->move(public_path('imagenes/serviciosMecanicos/acreditacion_1'), $acreditacion_1_path);
                $servicio->acreditacion_1 = $acreditacion_1_path;
            }

         
$dd($servicio);
            $servicio->save();
            
            return redirect()->route('servicios-mecanicos.index')->with('success', 'El servicio se ha actualizado correctamente.');
       

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicioMecanico $servicioMecanico, $id)
    {
        try{
            $servicioMecanico = ServicioMecanico::find($id);

            if (!$servicioMecanico) {
                // Si el servicio mecánico no existe, puedes mostrar un mensaje de error o redirigir a una página de error.
                // Por ejemplo:
                return redirect()->route('servicios-mecanicos.index')->with('error', 'El servicio mecánico no existe.');
            }

            // Verificar si existen registros relacionados en la tabla 'contrataciones'
            if (Contratacion::where('servicio_id', $id)->exists()) {
                // Si hay registros relacionados, mostrar una alerta o mensaje de error
                return redirect()->route('servicios-mecanicos.index')->with('error', 'No puedes eliminar este servicio porque tiene contrataciones asociadas.');
            }
        
            // Eliminar los campos relacionados con el servicio mecánico de la base de datos
            $servicioMecanico->delete();
        
            // Redirigir a la página de índice de servicios mecánicos con un mensaje de éxito
            return redirect()->route('servicios-mecanicos.index')->with('success', 'El servicio mecánico ha sido eliminado correctamente.');
        
        }catch (\Exception $e) {
            // Error en el servidor o problemas de conexión a Internet
            return redirect()->back()->with('error', 'Ha ocurrido un error en el servidor. Por favor, inténtalo nuevamente más tarde.');
        };
    }

    public function buscarServicio(Request $request)
    {
        try{
            // Obtén los rubros seleccionados del formulario de búsqueda
            $rubros = $request->input('rubro');

            // Consulta los servicios mecánicos que coincidan con los rubros seleccionados
            $serviciosMecanicos = ServicioMecanico::whereIn('rubro', $rubros)->get();

            // Retorna los resultados de la búsqueda en formato JSON
            return response()->json($serviciosMecanicos);
        }catch (\Exception $e) {
            // Error en el servidor o problemas de conexión a Internet
            return redirect()->back()->with('error', 'Ha ocurrido un error en el servidor. Por favor, inténtalo nuevamente más tarde.');
        };
    }
    public function indexInterno() 
{
  // Lógica interna
  $serviciosMecanicos = ServicioMecanico::all();
  
  return view('serviciosMecanicos.ServiciosSitio', compact('serviciosMecanicos'));

}



}