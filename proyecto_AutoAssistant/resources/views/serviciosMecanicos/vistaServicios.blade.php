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

        .card-body {
            background: black;
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

        .cardo {
            background-color: black;
            /* Cambia "red" por el color que desees */
        }
    </style>
    <main class=" row justify-content-center background-image">
        <br>


        <div class="container">
            <br>
            <a href="{{ route('servicios-mecanicos.indexinterno') }}" class="btn btn-primary">
                <i class='bx bx-arrow-back bx-flashing bx-flip-vertical'></i>REGRESAR
            </a>

            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-primary btn-lg" href="{{ route('contrataciones.create', $servicioMecanico->id) }}">
                    <i class='bx bx-shield-quarter bx-tada'></i> Contratar Servicio
                </a>
            </div>
            <br>
        </div>
        <div class="container">
            <div class="card text-bg-dark border-primary cardo">
                <div style="color:white;" class="card-header">SERVICIO MECANICO</div>
                <img src="{{ asset($servicioMecanico->logo) }}" alt="servicio" style="max-width: 400px; margin-top:10px;">
                <div class="card-img-overlay">
                    <h4 class="card-title title">{{ $servicioMecanico->servicios }}</h4>
                </div>
            </div>
        </div>

        <br>

        <div class="row gx-1">
            <div class="col">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">OFRECIDO POR</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->representante }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">TIPO DE SERVICIO</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->tipoServicio }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">HORA DE ABRIR</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->hora1 }}</h5>
                        </div>
                    </div>



                </div>
            </div>

            <div class="col">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">DIRECCIÓN</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->direccion }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">RUBRO</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->rubro }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">HORA DE CERRAR</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->hora2 }}</h5>
                        </div>
                    </div>



                </div>
            </div>

            <div class="col">
                <div class="p-3">
                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">DIA DE INICIO</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->fechaInicio }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">DIA DE FIN</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->fechaFin }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mb-3 mt-3">
                        <div class="card-header bg-primary">CONTACTO</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">{{ $servicioMecanico->numeroContacto }}</h5>
                        </div>
                    </div>

                    <div class="card text-bg-dark border-primary mt-3">
                        <div class=" card-header bg-primary">COSTO ESTIMADO</div>
                        <div class="card-body">
                            <h5 style="color:white;" class="card-title">${{ $servicioMecanico->precio }}</h5>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container px-4 text-center">
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

                        @if ($servicioMecanico->acreditacion_2)
                            <img id="acreditacion_2" src="{{ asset($servicioMecanico->acreditacion_2) }}"
                                alt="Logo Preview" style="max-width: 200px; margin-top: 10px;">
                        @else
                            <img id="acreditacion_2 src=" #" alt="Logo Preview"
                                style="max-width: 200px; margin-top: 10px; display: none;">
                        @endif

                        @if ($servicioMecanico->acreditacion_3)
                            <img id="acreditacion_3" src="{{ asset($servicioMecanico->acreditacion_3) }}"
                                alt="Logo Preview" style="max-width: 200px; margin-top: 10px;">
                        @else
                            <img id="acreditacion_3 src=" #" alt="Logo Preview"
                                style="max-width: 200px; margin-top: 10px; display: none;">
                        @endif

                        @if ($servicioMecanico->acreditacion_4)
                            <img id="acreditacion_4" src="{{ asset($servicioMecanico->acreditacion_4) }}"
                                alt="Logo Preview" style="max-width: 200px; margin-top: 10px;">
                        @else
                            <img id="acreditacion_4 src=" #" alt="Logo Preview"
                                style="max-width: 200px; margin-top: 10px; display: none;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>


        <br>
        <br>
        <br>
    @endsection
</main>
