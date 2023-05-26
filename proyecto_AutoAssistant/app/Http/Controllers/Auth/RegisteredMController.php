<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredMController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.registerA');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //Validacion de los campos del formulario de mecanicos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'numeric', 'min:18'],
            'rol'  => ['required', 'string', 'max:255', Rule::in(['taller_mecanico', 'mecanico_independiente'])],
            'email'=> ['required', 'string', 'max:255', 'email', Rule::unique('users')],
            'password' =>['required', 'confirmed', Rules\Password::default()],
        ],[
            'required' =>'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'min' => 'Debe ser mayor de 18 años para crear una cuenta como mecanico independiente o taller mecanico.',
            'in' => 'El valor seleccionado para el campo :attribute es inválido.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'unique' => 'El correo electrónico ya existe en nuestros datos. Por favor, seleccione otro.',
        ]);

        //Creacion del nuevo mecanico
        $user = User::create([
            'name' => $request->name,
            'edad' => $request->edad,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
        
        ]);

        //Verificacion de que los datos del mecanico se haya creado correctamente
        if(!$user){
            return back()->with('error', 'Hubo un erro al cargar sus datos. Por favor, intentelo de nuevo');
        }

        //asignacion de roles
        if($request->rol === 'taller_mecanico'){
            $user->assignRole('taller_mecanico');
        } elseif($request->rol === 'mecanico_independiente'){
            $user->assignRole('mecanico_independiente');
        }
        
        //Envio de la notificacion de verificacion por correo electronico
        event(new Registered($user));
        $user->sendEmailVerificationNotification();

        //Autentificaion del usuario recien registrado
        Auth::login($user);

        //Redireccionamos segun el estado de autentificacion
        if (Auth::check()){
            return redirect('/email/verify');
        }else{
            return back()->with('error', 'Hubo un error al autentifical sus dato. Por favor, intentelo de nuevo.');
        }

    }


}
