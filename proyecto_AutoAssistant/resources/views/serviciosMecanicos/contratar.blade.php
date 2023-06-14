<style>
    .container {
        
    }

    .modal-content {
        margin: 1% auto;
        padding: 20px;
        width: 80%;
        max-width: 600px;
        background-color: #32525C !important; /* Color de fondo del contenido del modal */
        color: white;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #32525C;
        color: white;
        padding: 10px;
    }

    .modal-title {
        margin: 0;
        text-align: left;
    }

    .modal-body {
        padding: 10px;
    }
    .form-group {
    margin-bottom: 20px;
    }

</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contratar servicio') }}
        </h2>
    </x-slot>
    <br>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif

        <!-- Modal -->
        <div class="container">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contratar el servico</h4>
                    <a href="{{ route('contrataciones.index') }}" class=" btn btn-danger close">&times;</a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contrataciones.store',$servicioMecanico->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                        <!-- Campos del formulario -->

                        <div class="form-floating col-12 form-group">
                            <input type="text" class="text-bg-dark form-control" id="conductor" name="conductor"  value="{{ auth()->user()->name }}"  disabled>
                            <label for="conductor" class="text-white">Nombre del Conductor </label>
                            <x-input-error :messages="$errors->get('conductor')" class="alert alert-danger" role="alert"/>
                        </div>
                        <div class="form-floating col-12 form-group">
                            <input type="text" class="form-control" id="servicios" name="servicios" value="{{ $servicioMecanico->servicios }}"   disabled >
                            <label for="servicios">Servicio a Contratar</label>
                            <x-input-error :messages="$errors->get('servicios')" class="alert alert-danger" role="alert"/>
                        </div>
                        <div class="form-floating col-12 form-group">
                            <input type="datetime-local" class="form-control" id="fecha" name="fecha" placeholder="Fecha y Hora" >
                            <label for="fecha">Fecha y Hora</label>
                            <x-input-error :messages="$errors->get('fecha')" class="alert alert-danger" role="alert"/>
                        </div>
                        <div class="form-floating col-12 form-group">
                            <select id="tipoServicio" name="tipoServicio" class="form-select">
                            <option disabled value="">Tipo Servicio...</option>
                            <option value="Adomicilio">Adomicilio</option>
                            <option value="Cita/Reserva" >Cita/Reserva</option>
                            </select>
                            <label for="tipoServicio">Selecciona un Tipo de Servicio</label>
                            <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert"/>
                        </div>
                        <div class="form-group">
                            <!-- Botón para contratar el servicio -->
                            <button type="submit" class="btn btn-primary">Contratar Servicio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
