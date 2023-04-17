<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Publicaciones') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('publicaciones.buscar') }}">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ingrese el título de la publicación">
                            </div>

                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <select name="marca" id="marca" class="form-control">
                                <option value="">Seleccione una marca</option>
                                @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <select name="modelo" id="modelo" class="form-control">
                                <option value="">Seleccione un modelo</option>
                                @foreach($modelos as $modelo)
                                <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ano">Año:</label>
                                <select name="ano" id="ano" class="form-control">
                                <option value="">Seleccione un año</option>
                                @foreach($anos as $ano)
                                <option value="{{ $ano->id }}">{{ $ano->ano }}</option>
                                @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>

                    <hr>

                    <div class="row">
                        @foreach ($publicaciones as $publicacion)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $publicacion->imagen) }}" class="card-img-top" alt="{{ $publicacion->titulo }}">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                                        <p class="card-text">{{ $publicacion->descripcion }}</p>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Marca:</strong> {{ $publicacion->marca->nombre }}</li>
                                        <li class="list-group-item"><strong>Modelo(s):</strong> {{ implode(', ', $publicacion->modelos->pluck('nombre')->toArray()) }}</li>
                                        <li class="list-group-item"><strong>Año(s):</strong> {{ implode(', ', $publicacion->anos->pluck('ano')->toArray()) }}</li>
                                    </ul>

                                    <div class="card-body">
                                        <a href="{{ route('publicaciones.show', $publicacion) }}" class="card-link">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $publicaciones->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>