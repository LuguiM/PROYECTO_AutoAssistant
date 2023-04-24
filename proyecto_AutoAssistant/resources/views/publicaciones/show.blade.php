<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Piloto') }}
        </h2>
    </x-slot>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="mb-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Detalles de la publicación
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $publicacion->titulo }}</h2>
                        <img class="card-img-top" src="{{ asset($publicacion->imagen) }}" alt="{{ $publicacion->titulo }}">
                        <p class="card-text"><strong>Descripción:</strong> {{ $publicacion->descripcion }}</p>
                        <p class="card-text"><strong>Marca:</strong> {{ $publicacion->marca->nombre }}</p>
                        <p class="card-text"><strong>Modelo:</strong> {{ $publicacion->modelo->nombre }}</p>
                        <p class="card-text"><strong>Año:</strong> {{ $publicacion->anio->anio }}</p>

                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        SOLUCION
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{ $publicacion->solucion }}</div>
                                </div>
                            </div>
                        </div>
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
