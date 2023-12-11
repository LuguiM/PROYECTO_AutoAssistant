<style>
.container {}

.modal-content {
    margin: 1% auto;
    padding: 20px;
    width: 80%;
    max-width: 600px;
    background-color: #32525C !important;
    /* Color de fondo del contenido del modal */
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
            {{ __('Modificar servicio') }}
        </h2>
    </x-slot>
    <br>
    <!-- Modal -->
    <div class="container">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modificar el servico</h4>
                <a href="{{ route('contrataciones.index') }}" class=" btn btn-danger close">&times;</a>
            </div>
            <div class="modal-body">
                <form id="myForm" action="{{ route('contrataciones.update',$contratacion->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <!-- Campos del formulario -->

                    <div class="form-floating col-12 form-group">
                        <input type="text" class="text-bg-dark form-control" id="conductor" name="conductor"
                            value="{{ $contratacion->conductorName }}" disabled>
                        <label for="conductor" class="text-white">Nombre del Conductor</label>
                    </div>
                    <div class="form-floating col-12 form-group">
                        <input type="text" class="form-control" id="servicios" name="servicios"
                            value="{{ $contratacion->servicioContratado }}" disabled>
                        <label for="servicios">Servicio a Contratar</label>
                    </div>
                    <div class="form-floating col-12 form-group">
                        <input type="datetime-local" class="form-control" id="fecha" name="fecha"
                            placeholder="Fecha y Hora" value="{{ $contratacion->fecha }}">
                        <label for="fecha">Fecha y Hora</label>
                    </div>
                    <div class="form-floating col-12 form-group">
                        <select id="tipoServicio" name="tipoServicio" class="form-select" disabled>
                            <option disabled value="">Tipo Servicio...</option>
                            <option value="Adomicilio" @if($contratacion->tipoServicio == 'Adomicilio') selected
                                @endif>Adomicilio</option>
                            <option value="Cita/Reserva" @if($contratacion->tipoServicio == 'Cita/Reserva') selected
                                @endif>Cita en Taller</option>
                        </select>
                        <label for="tipoServicio">Selecciona un Tipo de Servicio</label>
                    </div>
                    <div class="form-group">
                        <!-- Botón para contratar el servicio -->
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Realiza cualquier validación adicional que necesites aquí

    // Mostrar notificación de éxito después de 5 segundos
    alertify.success('¡Servicio modificado con éxito!');
    setTimeout(function() {
        document.getElementById('myForm').submit();
    }, 2000);
});
</script>