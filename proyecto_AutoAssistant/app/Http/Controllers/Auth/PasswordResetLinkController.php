<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ],[
            'required' => 'El campo es obligatorio.',
            'email' => 'El campo debe ser una direccion de correo valida.'
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Se ha enviado el enlace a tu correo');
        } else if ($response === Password::INVALID_USER) {
            return back()->withErrors(['email' => 'El campo de correo electrónico debe ser una dirección de correo electrónico válida.'])
                         ->withInput($request->only('email'));
        }
    }
    
    public function showLinkRequestForm(): View
    {
        return view('forgot-password', ['message' => 'Verifica tu email']);
    }
}
