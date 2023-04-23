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
                    <form action="{{ route('publicaciones.buscar') }}" method="GET">
                        <div class="form-row">
                            <div class="col">
                            <input type="text" name="q" class="form-control" placeholder="Buscar por título">
                            </div>
                            <div class="col">
                            <select name="marca" class="form-control">
                                <option value="">Seleccionar marca</option>
                                @if($marcas && $marcas->count())
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                @endif

                            </select>
                            </div>
                            <div class="col">
                            <select name="modelo" class="form-control">
                                <option value="">Seleccionar modelo</option>
                                @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                            <select name="anio" class="form-control">
                                <option value="">Seleccionar año</option>
                                @foreach ($anios as $anio)
                                <option value="{{ $anio->id }}">{{ $anio->anio }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <div class="row">
                        @foreach ($publicaciones as $publicacion)
                            <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $publicacion->imagen }}" class="card-img-top" alt="{{ $publicacion->titulo }}">
                                <div class="card-body">
                                <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                                
                                <a href="{{ route('publicaciones.show', $publicacion->id) }}" class="btn btn-primary">Ver detalles</a>
                                </div>
                                <div class="card-footer">
                                <small class="text-muted">{{ $publicacion->marca->nombre }} {{ $publicacion->modelo->nombre }} {{ $publicacion->anio->anio }}</small>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
