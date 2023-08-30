@extends('sitioweb')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

.background-image {
    background-image: url('/imagenes/fondo4.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.cardo {
    position: relative;
    text-align: center;
}

h5 {
    color: black;
}

.title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 36px;
    color: black !important;
    text-shadow: 0 0 10px white;
    text-align: right;
    text-transform: uppercase;
}





@keyframes glow {
    0% {
        text-shadow: 0 0 10px white;
    }

    100% {
        text-shadow: 0 0 20px lightblue, 0 0 30px lightblue, 0 0 40px lightblue, 0 0 50px white, 0 0 60px white, 0 0 70px white, 0 0 80px white;
    }
}

.blurred-image {
    filter: blur(0px);
    max-width: 100%;
    height: auto;
    padding: 0 0 10px 12px;
}

@media (max-width: 768px) {
    .blurred-image {
        padding-right: 20px;
    }

    .cardo {
        text-align: center;
    }
}
</style>
<main class=" background-image">
    <br>

    <div class="container">
        <a href="{{ route('servicios-mecanicos.indexinterno') }}" class="btn btn-primary"><i
                class='bx bx-arrow-back bx-flashing bx-flip-vertical'></i>REGRESAR</a>
    </div>
    <br>
    <div class="container">
        <div class="card text-bg-dark border-primary cardo">
            <div class="card-header">SERVICIO MECANICO</div>
            <img src="{{asset($servicioMecanico->logo)}}" alt="servicio" style="max-width: 400px; margin-top:10px;">
            <div class="card-img-overlay">
                <h4 class="card-title title">{{$servicioMecanico->servicios}}</h4>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3">
                        <div class="card-header bg-primary">OFRECIDO POR</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->representante}}</h5>
                        </div>
                        <div class="card-header bg-primary">TIPO DE SERVICIO</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->tipoServicio}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3">
                        <div class="card-header bg-primary">DIRECCION</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->direccion}}</h5>
                        </div>
                        <div class="card-header bg-primary">RUBRO</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->rubro}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3">
                        <div class="card-header bg-primary">HORARIO</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->horario}}</h5>
                        </div>

                        <div class="card-header bg-primary">HORARIO
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->horario2}}</h5>
                        </div>
                        <div class="card-header bg-primary">CONTACTO</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$servicioMecanico->numeroContacto}}</h5>
                        </div>
                    </div>
                    <div class="card text-bg-dark border-primary mb-3">
                        <div class="card-header bg-primary">Imagen</div>
                        <div class="card-body">
                            @if ($servicioMecanico->acreditacion_1)
                            <img id="acreditacion_1" src="{{ asset($servicioMecanico->acreditacion_1) }}"
                                alt="Logo Preview" style="max-width: 200px; margin-top: 10px;">
                            @else
                            <img id="acreditacion_1" src="#" alt="Logo Preview"
                                style="max-width: 200px; margin-top: 10px; display: none;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center">
        <a class="btn btn-success btn-lg" href="{{ route('contrataciones.create') }}" style="width: 100%;">
            <i class='bx bx-arrow-back-quarter bx-tada'></i> Contratar Servicio
        </a>
    </div>

    @endsection
</main>