@extends('sitioweb')
@section('content')
<style>
    .card_p {
        max-width: 200px;
        margin: 0 auto;
        filter: brightness(50%);
        transition: filter 0.3s;
        border-radius: 10px; /* Ajusta el radio de las esquinas */
    }

    .card_img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px; /* Ajusta el radio de las esquinas */
    }

    .card_title_p {
        font-size: 16px;
        margin-bottom: 5px;
        
    }

    /* Estilos para volver a la apariencia normal al pasar el mouse */
    .card_p:hover {
        filter: brightness(100%); /* Restaura el nivel de brillo normal */
    }

    .card_p:hover .card_title_p {
        color: initial; /* Restaura el color del texto normal */
    }
    .background-image {
        background-image: url('/imagenes/fondo4.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

</style>
<main class=" background-image">
    <br>
<div class="container">
    <div class="row justify-content-center background-image"> <!-- Agrega la clase justify-content-center aquí -->
        <div class="col-md-8">
            <div class="card card_b">
                <div class="card-header text-center">
                    BUSQUEDA
                </div>
                <div class="card-body">
                    <form action="{{ route('publicaciones.busscar') }}" method="GET">
                        <div class="form-row">
                            <div class="col">
                                <label class="form-label">Buscar por Nombre</label>
                                <input type="text" name="q" class="form-control select_b" placeholder="Nombre del piloto" value="{{ request('q') }}">
                            </div>
                            <div class="col"> <!-- Elimina el <br> para que los elementos se alineen horizontalmente -->
                            <br>
                                <div class="btn-group" role="group">

                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('publicaciones.otravista') }}" class="btn btn-secondary">Limpiar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
    <div class="row ">
@if($publicaciones && $publicaciones->count() > 0)
@foreach ($publicaciones->take(40) as $publicacion)
                <div class="col-md-3">
                    <div class="card mb-5 shadow-sm card_p">
                        <img class="card-img-top card_img" src="{{ asset($publicacion->imagen) }}" alt="{{ $publicacion->titulo }}" href="{{ route('publicaciones.show1', $publicacion->id) }}">
                        <div class="card-body">
                            <h5 class="card-title card_title_p">{{ $publicacion->titulo }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('publicaciones.show1', $publicacion->id) }}" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                                </div>
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

@endsection
</main>