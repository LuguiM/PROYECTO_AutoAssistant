<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pilotos') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card_b">
                    <div class="card-header text-center">
                        BUSQUEDA
                    </div>
                    <div class="card-body">
                        <form action="{{ route('publicaciones.buscar') }}" method="GET">
                            <div class="form-row">
                                <div class="col">
                                    <label class="form-label">Buscar por Nombre</label>
                                    <input type="text" name="q" class="form-control select_b" placeholder="Nombre del piloto" value="{{ request('q') }}">
                                </div>
                               
                                <br>
                                <div class="col">
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-primary">Buscar</button>

                                        <a href="{{ route('publicaciones.index') }}" class="btn btn-secondary">Limpiar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @if($publicaciones && $publicaciones->count())
            @foreach ($publicaciones as $publicacion)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm card_p">
                    <img class="card-img-top" src="{{ asset( $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}" href="{{ route('publicaciones.show', $publicacion->id) }}">
                    <div class="card-body">
                        <h5 class="card-title card_title_p">{{ $publicacion->titulo }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group ">
                                <a href="{{ route('publicaciones.show', $publicacion->id) }}" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                            </div>
                            <!--<small class="text-muted">{{ $publicacion->created_at->diffForHumans() }}</small>-->
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
