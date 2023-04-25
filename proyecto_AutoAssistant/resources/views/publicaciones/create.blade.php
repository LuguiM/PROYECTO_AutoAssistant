<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Piloto') }}
        </h2>
</x-slot>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear publicación') }}</div>

                    @if(session('mensaje'))
                                <div class="alert alert-success">{{ session('mensaje') }}</div>
                            @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>

                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="descripcion">{{ old('descripcion') }}</textarea>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="solucion" class="col-md-4 col-form-label text-md-right">{{ __('Solucion') }}</label>

                                <div class="col-md-6">
                                    <textarea id="solucion" class="form-control @error('solucion') is-invalid @enderror" name="solucion" required autocomplete="solucion">{{ old('solucion') }}</textarea>

                                    @error('solucion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                <div class="col-md-6">
                                    <input id="imagen" type="file" class="form-control-file @error('imagen') is-invalid @enderror" name="imagen" required>

                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>

                                <select class="form-control" id="marca" name="marca_id">
                                    <option value="">Seleccione una marca</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="modelo" class="col-md-4 col-form-label text-md-right">Modelo</label>
                                <select class="form-control" id="modelo" name="modelo_id">
                                    <option value="">Seleccione un modelo</option>
                                    @foreach($modelos as $modelo)
                                        <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="anios" class="col-md-4 col-form-label text-md-right">Año</label>
                                <select class="form-control" name="anios[]" multiple>
                                    @foreach($anios as $anio)
                                        <option value="{{ $anio->id }}">{{ $anio->anio }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                        <div class="form-group row mb-0">
                        
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear publicación') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>