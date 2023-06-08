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

            <div class="row">
                @if($contrataciones && $contrataciones->count() > 0)
                    @foreach($contrataciones->take(10) as $contratacion)
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
                                        <button class="btn btn-primary btn-lg "><i class='bx bxs-edit' ></i>Modificar</button>
                                        <form action="{{ route('contrataciones.destroy', $contratacion->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-lg btn-block"><i class='bx bx-trash'></i>Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-secondary btn-lg"><i class='bx bx-message-detail'></i> Chat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-white">
                        <p>No se encontraron los pilotos buscados.</p>
                    </div>
                @endif
            </div>

            
    </div>

</x-app-layout>