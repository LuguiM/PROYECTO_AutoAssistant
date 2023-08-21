<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show()
    {
        $user = auth()->user();
    
        // Verificar si el usuario tiene una contraseña establecida
        $hasPassword = ! is_null($user->password);
    
        return view('profile.show', compact('user', 'hasPassword'));
    }

    public function edit(Request $request): View
    {   
        $user = Auth::user();

        $hasPassword = ! is_null($user->password);

        $isGoogleUser = $user->google_id !==null;
        return view('profile.edit', compact('user', 'isGoogleUser', 'hasPassword'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'string', 'max:255'],
            'licencia' => ['nullable', 'string', 'max:255'],
            'numero_licencia' => ['nullable', 'string', 'max:255'],
        ]);
        
        $request->user()->fill([
            'name' => $request->name,
            'edad' => $request->edad,
            'licencia' => $request->licencia,
            'numero_licencia' => $request->numero_licencia,
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();
        $hasPassword = !is_null($user->password);

        if ($hasPassword) {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
