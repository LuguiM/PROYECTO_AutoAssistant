<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratacion;

class MensajeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($servicioId)
    {
        $contratacion = Contratacion::where('id', $servicioId)->first();
        
        if($contratacion){
            $conductorId = $contratacion->conductor_id;
            $mecanicoId = $contratacion->mecanico_id;
            $contratacionId = $contratacion->id;

            // Obtener el userName del usuario autenticado
            $userName = auth()->user()->name;

            return view('chats.mensajeria', compact('conductorId', 'mecanicoId', 'contratacionId', 'userName'));
        }else{
            return redirect()->back()->with('error', 'No se encontro una contratacion');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
