<style>
  @import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');
 .imgg{
    padding:40px 0 0px 0px;
 }
 .card {
    margin-bottom: 20px;
    margin-right: 20px; /* Espaciado entre las cards */
}

</style>
@if(auth()->user()->hasAnyRole('conductor','futuro_conductor'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Contratados') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


            <div class="row">
            @if(Auth::check())
                @if($contrataciones->isEmpty())
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            No tienes ningún servicio mecánico inscrito.
                        </div>
                    </div>
                @else
                    @php
                        $hasServices = false;
                    @endphp
                        @foreach($contrataciones as $contratacion)
                            @if(Auth::id() == $contratacion->conductor_id)
                                @php
                                    $hasServices = true;
                                @endphp
                                <div class="card text-bg-dark border-primary mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                        <img src="\imagenes\sin letras.png" class="img-fluid mx-auto imgg" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $contratacion->servicioContratado }}</h5>
                                                <p class="card-text"><small class="text-body-secondary text-white">Fecha de Contratacion: {{ $contratacion->fecha }}</small></p>
                                                <div class="d-flex justify-content-between">
                                                    <a class="btn btn-primary btn-lg" href="{{ route('contrataciones.edit', $contratacion->id) }}" ><i class='bx bxs-edit' ></i>Modificar</a>
                                                    <form action="{{ route('contrataciones.destroy', $contratacion->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-lg btn-block"><i class='bx bx-trash'></i>Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end">
                                                <a class="btn btn-secondary btn-lg" href="{{ route('mensajeria.index', $contratacion->id) }}"><i class='bx bx-message-detail'></i> Chat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            @endif
                        @endforeach
                        @if(!$hasServices)
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    No tienes ningún servicio mecánico contratado.
                                </div>
                            </div>
                        @endif
                @endif    
            @endif
            </div>

</x-app-layout>
@endif

@if(auth()->user()->hasAnyRole('mecanico_independiente','taller_mecanico'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Activos') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif



            <div class="row">
            @if(Auth::check())
                @if($contrataciones->isEmpty())
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            No tienes ningún servicio mecánico inscrito.
                        </div>
                    </div>
                @else
                    @php
                        $hasServices = false;
                    @endphp
                        @foreach($contrataciones as $contratacion)
                            @if(Auth::id() == $contratacion->mecanico_id)
                                @php
                                    $hasServices = true;
                                    $conductor = App\Models\User::findOrFail($contratacion->conductor_id);
                                @endphp
                                <div class="card text-bg-dark border-primary mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                        <img src="\imagenes\sin letras.png" class="img-fluid mx-auto imgg" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">{{ $contratacion->servicioContratado }}</h5>
                                                <p class="card-text">Contratado Por: <span class="badge text-bg-success">{{ $conductor->name }}</span></p>
                                                <p class="card-text"><small class="text-body-secondary text-white">Fecha de Contratacion: {{ $contratacion->fecha }}</small></p>
                                            </div>
                                            <div class="card-footer text-end">
                                                <a class="btn btn-secondary btn-lg" href="{{ route('mensajeria.index', $contratacion->id) }}"><i class='bx bx-message-detail'></i> Chat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if(!$hasServices)
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    No tienes ningún servicio mecánico Activo.
                                </div>
                            </div>
                        @endif
                @endif    
            @endif
            </div>

</x-app-layout>
@endif

