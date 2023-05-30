<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\PublicacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});


 
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    // $user->token
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ],
    [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'email_verified_at' => now(), // establece la fecha de verificación del correo electrónico
    ]);

    Auth::login($user);
    if(Auth::check()){
        return redirect('/email/verify');
    }else{
        return back()->with('error', 'Hubo un error al autenticar al usuario. Por favor, inténtalo de nuevo.');
    }
    /*
    if($user->email_verified_at){
        return redirect('/welcome');
    }
    else{
        return redirect('/email/verify');
    }*/
});


Route::get('/registro', function () {
    return view('registerA');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contactos', function () {
    return view('contactos');
});

Route::get('/opciones', function () {
    return view('opciones');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/funciones', function () {
    return view('funciones');
});
Route::get('/lol', function () {
    return view('lol');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/mario', function () {
    return view('mario');
});

//Inscripcion de servicios mecanicos
Route::get('/requisitos', function () {
    return view('serviciosMecanicos.requisitos');
});

Route::get('/inscripcion', function () {
    return view('serviciosMecanicos.inscripcion');
});



Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/publicacion', [PublicacionController::class, 'index'])->name('publicaciones.index');
Route::get('/publicaciones/create', [PublicacionController::class, 'create'])->name('publicaciones.create');
Route::post('/publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');
Route::get('/publicaciones/buscar', [PublicacionController::class, 'buscar'])->name('publicaciones.buscar');
Route::get('/publicaciones/{publicacion}', 'App\Http\Controllers\PublicacionController@show')->name('publicaciones.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
