<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('PILOTOS (ICONOS)') }}
            </h2>
    </x-slot>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Buscar publicaciones
                </div>
                <div class="card-body">
                    <form action="{{ route('publicaciones.buscar') }}" method="GET">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="q" class="form-control" placeholder="Buscar por título" value="{{ request('q') }}">
                            </div>
                            <div class="col">
                                <select name="marca" class="form-control">
                                    <option value="">Seleccionar marca</option>
                                    @if($marcas && $marcas->count())
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id }}" {{ (string) request('marca') === (string) $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col">
                                <select name="modelo" class="form-control">
                                    <option value="">Seleccionar modelo</option>
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo->id }}" {{ (string) request('modelo') === (string) $modelo->id ? 'selected' : '' }}>{{ $modelo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <select name="anio" class="form-control">
                                    <option value="">Seleccionar año</option>
                                    @foreach ($anios as $anio)
                                        <option value="{{ $anio->id }}" {{ (string) request('anio') === (string) $anio->id ? 'selected' : '' }}>{{ $anio->anio }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                        <img class="card-img-top" src="{{ asset( $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title card_title_p">{{ $publicacion->titulo }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('publicaciones.show', $publicacion->id) }}" class="btn btn-sm btn-outline-secondary">Ver detalles</a>
                                </div>
                                <!--<small class="text-muted">{{ $publicacion->created_at->diffForHumans() }}</small>-->
                            </div>
                        </div>
                    </div>
                </div>

               

            @endforeach
        @else
            <div class="col-md-12">
                <p>No se encontraron publicaciones.</p>
            </div>
        @endif
    </div>
</div>

</x-app-layout>
