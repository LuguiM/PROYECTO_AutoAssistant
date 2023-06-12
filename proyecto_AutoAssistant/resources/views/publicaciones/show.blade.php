<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Piloto') }}
        </h2>
    </x-slot>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('publicaciones.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
            <div class="card mb-3 card_show">
                <div class="card-header">
                    Detalles del Piloto
                </div>
                <div class="card-body">
                    <h2 class="card-title text-center">{{ $publicacion->titulo }}</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <img class="img-fluid" src="{{ asset($publicacion->imagen) }}" alt="{{ $publicacion->titulo }}">
                        </div>
                    </div>
                    <p class="card-text"><strong>Descripción:</strong> {{ $publicacion->descripcion }}</p>

                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed btn_card" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
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

</x-app-layout>
