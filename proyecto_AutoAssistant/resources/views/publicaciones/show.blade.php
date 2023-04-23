<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Piloto') }}
            </h2>
    </x-slot>
  
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="mb-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
                        </div>
                        <div class="panel-heading">Detalles de la publicación</div>
                        

                        <div class="panel-body">
                            <h2>{{ $publicacion->titulo }}</h2>
                            <img class="img-fluid" src="{{ asset($publicacion->imagen) }}" alt="{{ $publicacion->titulo }}" >
                        
                            
                            <p><strong>Descripción:</strong> {{ $publicacion->descripcion }}</p>
                            <p><strong>Marca:</strong> {{ $publicacion->marca->nombre }}</p>
                            <p><strong>Modelo:</strong> {{ $publicacion->modelo->nombre }}</p>
                            <p><strong>Año:</strong> {{ $publicacion->anio->anio }}</p>
                            <p><strong>SOLUCION:</strong></p>

                        </div>
                    </div>
            </div>
        </div>
        <div class="mt-5">
            <h3>Publicaciones recomendadas</h3>
            <div class="row">
                @foreach ($recomendaciones as $recomendacion)
                <div class="col-md-4 mb-3">
                <div class="card_p">
                    <img src="{{ asset($recomendacion->imagen) }}" class="card-img-top" alt="{{ $recomendacion->titulo }}">
                    <div class="card-body">
                    <h5 class="card_title_p">{{ $recomendacion->titulo }}</h5>
                    <a href="{{ route('publicaciones.show', $recomendacion->id) }}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>


</x-app-layout>
