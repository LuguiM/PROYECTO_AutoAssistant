@extends('layouts.app') {{-- Si estás usando una plantilla Blade por defecto de Laravel --}}

@section('content')
<div class="container">
    <h1>Crear Registro de Cultura</h1>
    <form method="POST" action="{{ route('cultura.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="imagen1">Imagen:</label>
            <input type="file" name="imagen1" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection