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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'string', 'max:255'],
            'licencia' => ['nullable', 'string', 'max:255', Rule::requiredIf($request->input('licencia'))],
            'numero_licencia' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'required' =>'El campo :attribute es obligatorio.',
        ]
        );
    
        if ($request->input('licencia')) {
            $request->validate([
                'numero_licencia' => ['required'],
            ]);
        }
    
        $user = User::create([
            'name' => $request->name,
            'edad' => $request->edad,
            'licencia' => $request->licencia,
            'numero_licencia' => $request->numero_licencia,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(!$user){
            return back()->with('error','Hubo un error al crear el usuario. Por favor, intentelo de nuevo');
        }
    
        event(new Registered($user));
        $user->sendEmailVerificationNotification();
    
        Auth::login($user);
        if(Auth::check()){
            return redirect(RouteServiceProvider::HOME);
        }else{
            return back()->with('error', 'Hubo un error al autenticar al usuario. Por favor, inténtalo de nuevo.');
        }
        
    }
}
