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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los campos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'numeric', 'max:255'],
            'licencia' => ['nullable', 'string', 'max:255'],
            'numero_licencia' => ['required_if:licencia,si', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'email', Rule::unique('users')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'unique' => 'El correo electrónico ya existe en nuestros datos. Por favor, seleccione otro.',
            'confirmed' => 'Los campos de contraseña no coinciden',
        ]);
        
        // Validación adicional para el campo 'numero_licencia' si 'licencia' está presente
        if ($request->input('licencia')) {
            $request->validate([
                'numero_licencia' => ['required','string'],
            ],[
                'numeric' => 'El campo :attribute debe ser un número.',
            ]);
        }

        // Asignación de roles según las condiciones
        if ($request->edad >= 18 && $request->licencia === 'SI') {
            $rol = 'conductor';
        } elseif ($request->edad >= 18 && empty($request->licencia)) {
            $rol = 'futuro_conductor';
        } elseif ($request->edad < 18 && empty($request->licencia)) {
            $rol = 'futuro_conductor';
        } else {
            $rol = 'conductor';
        }

        // Creación del nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'edad' => $request->edad,
            'licencia' => $request->licencia,
            'numero_licencia' => $request->numero_licencia,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $rol,

        ]);

        // Verificación de que el usuario se haya creado correctamente
        if (!$user) {
            return back()->with('error', 'Hubo un error al crear el usuario. Por favor, intentelo de nuevo');
        }

        /* Asignación de roles según las condiciones
        if ($user->edad >= 18 && $user->licencia === 'SI') {
            $user->assignRole('conductor');
        } elseif ($user->edad < 18 && empty($user->licencia)) {
            $user->assignRole('futuro_conductor');
        } elseif ($user->edad > 18 && empty($user->licencia)) {
            $user->assignRole('futuro_conductor');
        }*/
        
        $user->assignRole($rol);

        // Envío de la notificación de verificación por correo electrónico
        event(new Registered($user));
        $user->sendEmailVerificationNotification();

        // Autenticación del usuario recién registrado
        Auth::login($user);

        // Redireccionamiento según el estado de autenticación
        if (Auth::check()) {
            return redirect('/email/verify');
        } else {
            return back()->with('error', 'Hubo un error al autenticar al usuario. Por favor, inténtalo de nuevo.');
        }
    }


}
