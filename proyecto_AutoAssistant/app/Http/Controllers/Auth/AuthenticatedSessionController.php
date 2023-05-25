<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        try {
            $credentials = $request->validated();
    
            if (Auth::attempt($credentials, $request->boolean('remember')) && Auth::user()->markEmailAsVerified()) {
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            }

            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
    
            
        } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'No se pudo establecer una conexión con el servidor. Por favor, verifica tu conexión a internet y vuelve a intentarlo.');
            return redirect()->back();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
