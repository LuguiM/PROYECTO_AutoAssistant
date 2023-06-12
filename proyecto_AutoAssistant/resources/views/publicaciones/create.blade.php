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

                    <div class="card-body">
                        <form method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control " name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                    <x-input-error :messages="$errors->get('titulo')" class="alert alert-danger" role="alert"/>
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
                                    <textarea id="descripcion" class="form-control" name="descripcion" required autocomplete="descripcion">{{ old('descripcion') }}</textarea>
                                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert"/>
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
                                    <textarea id="solucion" class="form-control" name="solucion" required autocomplete="solucion">{{ old('solucion') }}</textarea>
                                    <x-input-error :messages="$errors->get('solucion')" class="alert alert-danger" role="alert"/>
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
                                    <input id="imagen" type="file" class="form-control-file " name="imagen" required>
                                    <x-input-error :messages="$errors->get('imagen')" class="alert alert-danger" role="alert"/>

                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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