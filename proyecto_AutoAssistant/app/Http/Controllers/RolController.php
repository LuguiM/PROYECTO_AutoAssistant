<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    public function insertRol(Request $request)
    {
        $user = User::find($request->user_id);

        if (!$user) {
            return back()->with('error', 'Usuario no encontrado.');
        }

        // Validar y guardar el campo 'rol' en la base de datos
        
        $validator = Validator::make($request->all(),[
            'rol' => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
        ]);;

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
            
        }

        $rol = strtolower($request->rol);
        //dd($rol);

        if($rol === 'taller_mecanico'){
            $user->assignRole('taller_mecanico');
        } elseif($rol === 'mecanico_independiente'){
            $user->assignRole('mecanico_independiente');
        }elseif($rol === 'conductor'){
            $user->assignRole('conductor');
        }elseif($rol === 'futuro_conductor'){
            $user->assignRole('futuro_conductor');
        }

        $user->rol = $rol;
        $user->save();

        //return redirect('/email/verify');
        Auth::login($user);
        if(Auth::check()){
            return redirect('/email/verify');
        }else{
            return back()->with('error', 'Hubo un error al autenticar al usuario. Por favor, inténtalo de nuevo.');
        }
    }
}