<style>
@import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

* {
    box-sizing: border-box;
}

main {
    display: flex;
    padding: 10px 0;
}

.filters {
    background: rgb(18, 121, 193);
    background: linear-gradient(0deg, rgba(0, 0, 255, 1) 0%, rgba(18, 121, 193, 1) 100%);
    position: sticky;
    z-index: 1;
    top: 76px;
    width: 160px;
    height: 100%;
    padding: 0 20px;
}

.filters h2 {
    color: white;
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 10px;
}

.filters label {
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
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Mecanicos') }}
        </h2>
    </x-slot>
    <br>

    <main>
        <aside class="filters">
            <h2>Rubros de talleres</h2>
            <form id="buscarForm">
                <label>
                    <input type="checkbox" name="rubro[]" value="Mecanico" onchange="buscarServicios()"> Mecanico
                </label>
                <label>
                    <input type="checkbox" name="rubro[]" value="Electronico" onchange="buscarServicios()"> Electrico
                </label>
                <label>
                    <input type="checkbox" name="rubro[]" value="Enderezado y Pintura" onchange="buscarServicios()">
                    Enderezado y Pintura
                </label>
                <label>
                    <input type="checkbox" name="rubro[]" value="General de Caja" onchange="buscarServicios()"> General
                    de Caja
                </label>
                <label>
                    <input type="checkbox" name="rubro[]" value="Lubricentro" onchange="buscarServicios()"> Lubricentro
                </label>
                <label>
                    <input type="checkbox" name="rubro[]" value="Llanteria" onchange="buscarServicios()"> Llanterias
                </label>
            </form>
        </aside>
        <div class="grid">
            @if($serviciosMecanicos && $serviciosMecanicos->count() > 0)
            @forelse ($serviciosMecanicos as $index => $servicio)

            <div class="grid-item grid-item-{{ $index }}" data-rubro="{{ $servicio->rubro }}"
                data-servicios="{{ json_encode($servicio->servicios) }}">
                <a href="{{ route('servicios-mecanicos.show', $servicio->id) }}">
                    <img src="{{ $servicio->logo }}" class="card-img-top" alt="..."
                        style="max-width: 200px; margin-top: 1px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $servicio->representante }}</h5>
                        <p class="card-text text-white">Rubro: {{ $servicio->rubro }}</p>
                        <p class="card-text text-white">Servicio: {{ $servicio->servicios }}</p>
                        <p class="card-text text-white">Tipo de servicio: {{ $servicio->tipoServicio }}</p>
                        <p class="card-text text-white">Costo estimado: ${{ $servicio->precio }}</p>
                    </div>
                    </b>
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
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Evento para capturar los cambios en los checkboxes de rubros
    $('input[name="rubro[]"]').change(function() {
        buscarServicios();
    });

    // Función para realizar la búsqueda y mostrar los resultados
    function buscarServicios() {
        var rubrosSeleccionados = $('input[name="rubro[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Ocultar todos los elementos de la cuadrícula
        $('.grid-item').hide();

        // Mostrar los elementos que coinciden con los rubros seleccionados
        $('.grid-item').each(function() {
            var rubro = $(this).attr('data-rubro');
            if (rubrosSeleccionados.length === 0 || rubrosSeleccionados.includes(rubro)) {
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

        // Modificar la URL sin recargar la página
        var state = {
            rubros: rubrosSeleccionados
        };
        var url = window.location.href.split('?')[0] + '?rubros=' + rubrosSeleccionados.join(',');
        history.pushState(state, '', url);
    }

    // Evento para controlar el retroceso del navegador
    window.onpopstate = function(event) {
        if (event.state && event.state.rubros) {
            $('input[name="rubro[]"]').prop('checked', false);
            var rubrosSeleccionados = event.state.rubros;
            for (var i = 0; i < rubrosSeleccionados.length; i++) {
                $('input[name="rubro[]"][value="' + rubrosSeleccionados[i] + '"]').prop('checked', true);
            }
            buscarServicios();
        }
    };
    </script>


</x-app-layout>