@extends('sitioweb')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

        * {
            box-sizing: border-box;
        }

        .background-image {
            background-image: url('/imagenes/fondo4.jpg');
            height: 100vh;
            width: 100%;
            /* Cambié 170vh a 100% para que sea más estándar */
            background-size: cover;
            background-position: center;
        }




        .filters {

            background: rgb(18, 121, 193);
            background: linear-gradient(0deg, rgba(0, 0, 255, 1) 0%, rgba(18, 121, 193, 1) 100%);
            position: static;
            z-index: 1;
            top: 76px;
            width: 160px;
            height: 100%;
            padding: 0 20px;
        }


        .card-img-top {
            max-height: 160px;
            /* Ajusta esta altura máxima según tus preferencias */
            overflow: hidden;
            /* Para recortar las imágenes si son demasiado altas */
        }

        .filters h2 {
            color: white;
            font-size: 14px;
            font-weight: 500;
            margin: 0 0 10px;
        }

        .s9 {
            display: flex;

        }


        .filters label {
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 10px;
            height: 55px;
            font-size: 14px;
            color: white;
        }

        .filters input {
            margin: 0;
            accent-color: #6245ef;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-right: 20px;
            padding-left: 10px;
            padding-bottom: 10px;
        }

        .grid-item {
            flex: 0 0 calc(23.33% - 10px);
            min-width: 200px;
            min-height: 100px;
            margin-bottom: 20px;
            margin-right: 10px;
            border: solid blue;
            background-color: #242424;
        }

        .card-img-top {
            max-width: 100%;
            max-height: 160px;
            display: block;
            margin: 0 auto;
            object-fit: contain;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .grid {
                flex-wrap: wrap;
                overflow: hidden;
                height: auto;
            }

            .grid-item {
                flex-basis: 100%;
                margin-right: 0;
            }
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-bottom: 10px;
            margin-top: 10px;
            max-width: 700px;
            text-align: center;
        }

        .search-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .search-button {
            background-color: #f00a62;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            margin-left: 5px;
        }
    </style>

    <body class="background-image">
        <div id="buscarForm" class="search-form">
            <input type="text" name="search" id="search" class="search-input" placeholder="Buscar servicios..."
                onkeyup="buscarServicios()">
            <button type="button" onclick="limpiarBusqueda()" class="search-button">Limpiar</button>
        </div>

        <div class="s9">
            <div class="filters">
                <h2>Rubros de talleres</h2>
                <form id="filtroForm">
                    <label>
                        <input type="checkbox" name="rubro[]" value="mecanico"> Mecánico
                    </label>
                    <label>
                        <input type="checkbox" name="rubro[]" value="electronico"> Eléctrico
                    </label>
                    <label>
                        <input type="checkbox" name="rubro[]" value="enderezado y pintura"> Enderezado y Pintura
                    </label>
                    <label>
                        <input type="checkbox" name="rubro[]" value="general de caja"> General de Caja
                    </label>
                    <label>
                        <input type="checkbox" name="rubro[]" value="lubricentro"> Lubricentro
                    </label>
                    <label>
                        <input type="checkbox" name="rubro[]" value="llanteria"> Llanterias
                    </label>
                </form>
            </div>



            <div class="grid row justify-content-center">
                @if ($serviciosMecanicos && $serviciosMecanicos->count() > 0)
                    @forelse ($serviciosMecanicos as $index => $servicio)
                        <div class="grid-item grid-item-{{ $index }}" data-rubro="{{ $servicio->rubro }}"
                            data-servicios="{{ json_encode($servicio->servicios) }}">
                            <a href="{{ route('servicios-mecanicos.show1', $servicio->id) }}">
                                <img src="{{ $servicio->logo }}" class="card-img-top" alt="..."
                                    style="max-width: 200px; margin-top: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $servicio->representante }}</h5>
                                    <p class="card-text text-white">Taller: {{ $servicio->nombreTaller }}</p>
                                    <p class="card-text text-white">Rubro: {{ $servicio->rubro }}</p>
                                    <p class="card-text text-white">Tipo de Servicio: {{ $servicio->tipoServicio }}</p>
                                    <p class="card-text text-white">Servicio: {{ $servicio->servicios }}</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-12 text-white">
                            <p>No se encontraron resultados</p>
                        </div>
                    @endforelse
                @else
                    <div class="col-md-12 text-white">
                        <p>No se encontraron resultados</p>
                    </div>
                @endif
            </div>
    </body>
    <script>
        function limpiarBusqueda() {
            // Limpiar el contenido del input de búsqueda
            document.getElementById("search").value = "";

            // Llamar a la función de búsqueda para actualizar los resultados
            buscarServicios();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Variables para almacenar los rubros seleccionados y el texto de búsqueda
        var filtroRubrosSeleccionados = [];
        var textoBusqueda = '';

        // Evento para capturar los cambios en los checkboxes de rubros
        $('input[name="rubro[]"]').change(function() {
            filtroRubrosSeleccionados = $('input[name="rubro[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            buscarServicios();
        });

        // Función para realizar la búsqueda y mostrar los resultados
        function buscarServicios() {
            // Obtener el texto de búsqueda
            textoBusqueda = $('#search').val().toLowerCase();

            // Ocultar todos los elementos de la cuadrícula
            $('.grid-item').hide();

            // Mostrar los elementos que coinciden con los rubros seleccionados y el texto de búsqueda
            $('.grid-item').each(function() {
                var rubro = $(this).attr('data-rubro').toLowerCase();
                var servicios = $(this).attr('data-servicios').toLowerCase();

                var rubroFiltrado = filtroRubrosSeleccionados.length === 0 || filtroRubrosSeleccionados.includes(
                    rubro);
                var textoFiltrado = textoBusqueda === '' || rubro.includes(textoBusqueda) || servicios.includes(
                    textoBusqueda);

                if (rubroFiltrado && textoFiltrado) {
                    $(this).show();
                }
            });

            // Mostrar mensaje cuando no hay resultados
            if ($('.grid-item:visible').length === 0) {
                if ($('.no-results-message').length === 0) {
                    $('.grid').append('<p class="no-results-message text-white">No se encontraron resultados</p>');
                }
            } else {
                $('.no-results-message').remove();
            }
        }
    </script>





    </body>

@endsection
