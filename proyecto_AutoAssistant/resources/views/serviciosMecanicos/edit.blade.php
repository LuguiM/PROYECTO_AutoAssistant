<style>
.container {
    background-color: #32525C;
    color: black;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
}

input::placeholder {
    color: black;
}

label {
    font-size: 16px;
}

img {
    max-width: 100%;
    max-height: 160px;
    display: block;
    margin: 0 auto;
    object-fit: contain;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar servicio') }}
        </h2>
    </x-slot>
    <br>
    @if(auth()->user()->hasRole('taller_mecanico'))

    <form action="{{ route('servicios-mecanicos.update', $servicioMecanico->id) }}" method="POST"
        enctype="multipart/form-data" class="container">
        <div class="row g-3">
            <div class="col-12">
                <h2 class="title text-white">Modificación de Servicio</h2>
            </div>
            @csrf
            @method('PUT')

            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="nombreTaller" name="nombreTaller"
                    placeholder="Nombre del Taller" value="{{ $servicioMecanico->nombreTaller }}"
                    aria-label="First name">
                <label for="nombreTaller">Nombre del taller</label>
                <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="representante" name="representante"
                    placeholder="Nombre del propietario" value="{{ $servicioMecanico->representante}}">
                <label for="propietario">Nombre del propietario</label>
                <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-md-6">
                <label for="fechaInicio">Horario de Inicio</label>
                <select id="fechaInicio" name="fechaInicio" placeholder="fechaInicio" class=" form-control select2">
                    <option value="{{ $servicioMecanico->fechaInicio }}" selected>{{ $servicioMecanico->fechaInicio }}
                    </option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>

                <x-input-error :messages="$errors->get('fechaInicio')" class="alert alert-danger" role="alert" />
            </div>
            <br>
            <div class="form-floating col-md-6">
                <label for="fechaFin">Horario de Fin</label>
                <select id="fechaFin" name="fechaFin" class="form-control select2">
                    <option value="{{ $servicioMecanico->fechaFin }}" selected>{{ $servicioMecanico->fechaFin }}
                    </option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>

                <x-input-error :messages="$errors->get('fechaFin')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-6">
                <input type="text" class="form-control timepicker" id="hora1" name="hora1" placeholder="Hora 1"
                    aria-label="Hora 1" value="{{ $servicioMecanico->hora1 }}">
                <label for="hora1">Hora de Abrir</label>
                <x-input-error :messages="$errors->get('hora1')" class="alert alert-danger" role="alert" />
            </div>
            <br>
            <div class="form-floating col-6">
                <input type="text" class="form-control timepicker" id="hora2" name="hora2" placeholder="Hora 2"
                    aria-label="Hora 2" value="{{ $servicioMecanico->hora2 }}">
                <label for="hora2">Hora de Cierre</label>
                <x-input-error :messages="$errors->get('hora2')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="numeroContacto" name="numeroContacto"
                    placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*"
                    title="Ingresa un formato telefonico valido" value="{{ $servicioMecanico->numeroContacto }}">
                <label for="numeroContacto">Numero de Contacto</label>
                <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio"
                    inputmode="numeric" pattern="[0-3\s]*" title="Ingresa un formato telefonico valido"
                    value="{{ $servicioMecanico->precio }}">
                <label for="precio">Costo estimado</label>
                <x-input-error :messages="$errors->get('precio')" class="alert alert-danger" role="alert" />
            </div>

            <div class="col-12">
                <label for="logo" class="text-white">Logo:</label>
                <input type="file" name="logo" id="logo" class="form-control" accept=".png, .jpg, .jpeg">
                @if ($servicioMecanico->logo)
                <img id="logo-preview" src="{{ asset($servicioMecanico->logo) }}" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px;">
                @else
                <img id="logo-preview" src="#" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px; display: none;">
                @endif
                <small class="form-text text-muted">Selecciona una nueva imagen para el logo del servicio
                    mecánico.</small>
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-12">
                <input type="text" class="form-control" id="direccion" name="direccion"
                    placeholder="Direccion/Adomicilio" aria-label="Last name"
                    value="{{ $servicioMecanico->direccion }}">
                <label for="direccion">Direccion del Taller</label>
                <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-12">
                <select id="rubro" name="rubro" class="form-select">
                    <option disable>Rubro...</option>
                    <option value="Mecanico" @if($servicioMecanico->rubro == 'Mecanico') selected @endif>Mecanico
                    </option>
                    <option value="Lubricentro" @if($servicioMecanico->rubro == 'Lubricentro') selected
                        @endif>Lubricentro</option>
                    <option value="Electronico" @if($servicioMecanico->rubro == 'Electronico') selected
                        @endif>Electronico</option>
                    <option value="Enderezado y Pintura" @if($servicioMecanico->rubro == 'Enderezado y Pintura')
                        selected @endif>Enderezado y Pintura</option>
                    <option value="General de Caja" @if($servicioMecanico->rubro == 'General de Caja') selected
                        @endif>General de Caja</option>
                    <option value="Llanteria" @if($servicioMecanico->rubro == 'Llanteria') selected @endif>Llanteria
                    </option>
                </select>
                <label for="rubro">Selecciona un Rubro</label>
            </div>
            <br>


            <div class="form-floating col-12">
                <select id="servicios" name="servicios" class="form-select">
                    <option disabled selected>Servicio que Ofrece...</option>
                    @if($servicioMecanico->servicios)
                    <option value="{{ $servicioMecanico->servicios }}" selected>{{ $servicioMecanico->servicios }}
                    </option>
                    @endif
                </select>
                <label for="servicios">Servicio que Ofrece</label>
                <x-input-error :messages="$errors->get('servicios')" class="alert alert-danger" role="alert" />
            </div>

            <div class="col-md-6">
                <label for="acreditacion_1" class="form-label text-white">Imagen</label>
                <input type="file" class="form-control" id="acreditacion_1" name="acreditacion_1"
                    placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                @if ($servicioMecanico->acreditacion_1)
                <img id="acreditacion_1" src="{{ asset($servicioMecanico->acreditacion_1) }}" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px;">
                @else
                <img id="acreditacion_1 src=" #" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px; display: none;">
                @endif


                @error('acreditacion_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert" />
            </div>

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

            <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Guardar cambios</button>
                <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger"><i class='bx bx-x-circle'></i>
                    Cancelar</a>
            </div>
        </div>
        <br>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/datepicker@3.2.0/dist/datepicker.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.timepicker', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i K', // Formato de hora (24 horas)
        });
    });
    </script>

    <script>
    // Aquí faltaba una llave de cierre en tu código original
    const rubroSelect = document.getElementById('rubro');
    const servicioSelect = document.getElementById('servicios');

    const serviciosPorRubro = {
        "Mecanico": [
            "Cambio de bujías.",
            "Cambio de aceite y filtro.",
            "Cambio de faja del alternador",
            "Cambio de frenos o regulacion",
            "Cambio o rectificación de discos de frenos",
            "Cambios de soporte de motor",
            "Cambio de amortiguadores",
            "Cambio de líquido de frenos",
            "Cambio de motor",
            "Cambio de bomba de frenos",
            "Reapriete de suspension",

        ],
        "Lubricentro": [
            "Cambio de aceite.",
            "Lavado y lubricación de chasis.",
            "Cambio de filtro de aire.",
            "Cambio de refrigerante",
            "Lubricacion de suspencion",
            "Cambio de aceite de trasmicion",

        ],
        "Electronico": [
            " Instalación de batería",
            " Reprogramacions y configuracion de control",
            " Revisión de cableado eléctrico ",
            "Cambio de computadora ",
            " Cambio de alternador ",
            " Cambio de luces ",
            " Cambio de tablero del vehículo",
            "Instalación de scaner ",

        ],
        "General de Caja": [
            "Cambio de convertidor ",
            "Cambio de sincronizados ",
            "Cambio de flechas de trasmisión",
            "Cambio de  filtro de aceite de caja",

        ],
        "Enderezado y Pintura": [
            "Enderezado de chasis ",
            "Cambio de bomper",
            "Cambio de parilla",
            "Enderezado de puertas",
            "Pintura general",
            "Pulido de espejos y faros",
            "Cambio de faldones",

        ],
        "Llanteria": [
            "Cambio de llanta",
            "Relación de fuga de llanta ",
            "Aliniado y balanceado",
            "Regulación de aire ",
        ],
    };

    rubroSelect.addEventListener('change', function() {
        const selectedRubro = rubroSelect.value;
        const servicios = serviciosPorRubro[selectedRubro];

        servicioSelect.innerHTML = ''; // Limpia las opciones actuales

        servicios.forEach(servicio => {
            const option = document.createElement('option');
            option.value = servicio;
            option.textContent = servicio;
            servicioSelect.appendChild(option);
        });
    });
    </script>



    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
    <form id="myForm" action="{{ route('servicios-mecanicos.update', $servicioMecanico->id) }}" method="PUT"
        enctype="multipart/form-data" class="container">
        <div class="row g-3">
            <div class="col-12">
                <h2 class="title text-white">Formulario de actualización de servicio</h2>
            </div>
            @csrf
            @method('PUT')

            <div class="form-floating col-12">
                <input type="text" class="form-control" id="representante" name="representante"
                    placeholder="representante" value="{{ $servicioMecanico->representante }}">
                <label for="representante">Nombre del Representante</label>
                <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-md-6">
                <label for="fechaInicio">Horario de Inicio</label>
                <select id="fechaInicio" name="fechaInicio" placeholder="fechaInicio" class=" form-control select2">
                    <option value="{{ $servicioMecanico->fechaInicio }}" selected>{{ $servicioMecanico->fechaInicio }}
                    </option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>

                <x-input-error :messages="$errors->get('fechaInicio')" class="alert alert-danger" role="alert" />
            </div>
            <br>
            <div class="form-floating col-md-6">
                <label for="fechaFin">Horario de Fin</label>
                <select id="fechaFin" name="fechaFin" class="form-control select2">
                    <option value="{{ $servicioMecanico->fechaFin }}" selected>{{ $servicioMecanico->fechaFin }}
                    </option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>

                <x-input-error :messages="$errors->get('fechaFin')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-6">
                <input type="text" class="form-control timepicker" id="hora1" name="hora1" placeholder="Hora 1"
                    aria-label="Hora 1" value="{{ $servicioMecanico->hora1 }}">
                <label for="hora1">Hora de Abrir</label>
                <x-input-error :messages="$errors->get('hora1')" class="alert alert-danger" role="alert" />
            </div>
            <br>
            <div class="form-floating col-6">
                <input type="text" class="form-control timepicker" id="hora2" name="hora2" placeholder="Hora 2"
                    aria-label="Hora 2" value="{{ $servicioMecanico->hora2 }}">
                <label for="hora2">Hora de Cierre</label>
                <x-input-error :messages="$errors->get('hora2')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="numeroContacto" name="numeroContacto"
                    placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*"
                    title="Ingresa un formato telefonico valido" value="{{ $servicioMecanico->numeroContacto }}">
                <label for="numeroContacto">Numero de Contacto</label>
                <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio"
                    inputmode="numeric" pattern="[0-3\s]*" value="{{ $servicioMecanico->precio }}">
                <label for="precio">Costo estimadoo</label>
                <x-input-error :messages="$errors->get('precio')" class="alert alert-danger" role="alert" />
            </div>
            <div class="col-12">
                <label for="logo" class="form-label text-white">Logo o Imagen del Servicio</label>
                <input type="file" class="form-control" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-12">
                <input type="text" class="form-control" id="direccion" name="direccion"
                    placeholder="Direccion/Adomicilio" aria-label="Last name"
                    value="{{ $servicioMecanico->direccion }}">
                <label for="direccion">Direccion del Taller</label>
                <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-12">
                <select id="rubro" name="rubro" class="form-select">
                    <option disable>Rubro...</option>
                    <option value="Mecanico" @if($servicioMecanico->rubro == 'Mecanico') selected @endif>Mecanico
                    </option>
                    <option value="Lubricentro" @if($servicioMecanico->rubro == 'Lubricentro') selected
                        @endif>Lubricentro</option>
                    <option value="Electronico" @if($servicioMecanico->rubro == 'Electronico') selected
                        @endif>Electronico</option>
                    <option value="Enderezado y Pintura" @if($servicioMecanico->rubro == 'Enderezado y Pintura')
                        selected @endif>Enderezado y Pintura</option>
                    <option value="General de Caja" @if($servicioMecanico->rubro == 'General de Caja') selected
                        @endif>General de Caja</option>
                    <option value="Llanteria" @if($servicioMecanico->rubro == 'Llanteria') selected @endif>Llanteria
                    </option>
                </select>
                <label for="rubro">Selecciona un Rubro</label>
            </div>
            <br>
            <div class="form-floating col-12">
                <select id="servicio" name="servicio" class="form-select">
                    <option disabled selected>Servicio que Ofrece...</option>
                    @if($servicioMecanico->servicios)
                    <option value="{{ $servicioMecanico->servicio }}" selected>{{ $servicioMecanico->servicios }}
                    </option>
                    @endif
                </select>
                <label for="servicio">Servicio que Ofrece</label>
                <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-12">
                <select id="tipoServicio" name="tipoServicio" class="form-select">
                    <option disabled>Tipo Servicio...</option>
                    <option value="Adomicilio" @if($servicioMecanico->tipoServicio == 'Adomicilio') selected
                        @endif>Adomicilio</option>
                    <option value="Cita/Reserva" @if($servicioMecanico->tipoServico == 'Cita en Taller') selected
                        @endif>Cita en Taller</option>
                </select>
                <label for="rubro">Selecciona un Tipo de Servicio</label>
                <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-12">
                <textarea class="form-control" id="descripcion" name="descripcion"
                    placeholder="Descripcion">{{ $servicioMecanico->descripcion }}</textarea>
                <label for="descripcion">Descripcion del Servicio</label>
                <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert" />
            </div>

            <div class="form-floating col-12">
                <select id="tipoServicio" name="tipoServicio" class="form-select">
                    <option disabled>Tipo Servicio...</option>
                    <option value="Adomicilio" @if($servicioMecanico->tipoServicio == 'Adomicilio') selected
                        @endif>Adomicilio</option>
                    <option value="Cita/Reserva" @if($servicioMecanico->tipoServico == 'Cita en taller') selected
                        @endif>Cita en Taller</option>
                </select>
                <label for="rubro">Selecciona un Tipo de Servicio</label>
                <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert" />
            </div>

            <div class="col-md-6">
                <label for="acreditacion_1" class="form-label text-white">Imagen</label>
                <input type="file" class="form-control" id="acreditacion_1" name="acreditacion_1"
                    placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                @if ($servicioMecanico->acreditacion_1)
                <img id="acreditacion_1" src="{{ asset($servicioMecanico->acreditacion_1) }}" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px;">
                @else
                <img id="acreditacion_1 src=" #" alt="Logo Preview"
                    style="max-width: 200px; margin-top: 10px; display: none;">
                @endif

                <small class="form-text text-muted">Selecciona una nueva imagen.</small>
                @error('acreditacion_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert" />
            </div>
            <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Guardar cambios</button>
                <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger"><i class='bx bx-x-circle'></i>
                    Cancelar</a>
            </div>
        </div>
        <br>
    </form>

    @endif



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/datepicker@3.2.0/dist/datepicker.min.js"></script>




    <script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.timepicker', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i K', // Formato de hora (24 horas)
        });
    });
    // Restricción de submit con notificación
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        // Realiza cualquier validación adicional que necesites aquí

        // Mostrar notificación de éxito
        alert('¡Servicio contratado con éxito!');

        // Envío del formulario después de la notificación
        setTimeout(function() {
            document.getElementById('myForm').submit();
        }, 1000);

    });
    </script>
    <script>
    // Aquí faltaba una llave de cierre en tu código original
    const rubroSelect = document.getElementById('rubro');
    const servicioSelect = document.getElementById('servicios');

    const serviciosPorRubro = {
        "Mecanico": [
            "Cambio de bujías.",
            "Cambio de aceite y filtro.",
            "Cambio de faja del alternador",
            "Cambio de frenos o regulacion",
            "Cambio o rectificación de discos de frenos",
            "Cambios de soporte de motor",
            "Cambio de amortiguadores",
            "Cambio de líquido de frenos",
            "Cambio de motor",
            "Cambio de bomba de frenos",
            "Reapriete de suspension",

        ],
        "Lubricentro": [
            "Cambio de aceite.",
            "Lavado y lubricación de chasis.",
            "Cambio de filtro de aire.",
            "Cambio de refrigerante",
            "Lubricacion de suspencion",
            "Cambio de aceite de trasmicion",

        ],
        "Electronico": [
            " Instalación de batería",
            " Reprogramacions y configuracion de control",
            " Revisión de cableado eléctrico ",
            "Cambio de computadora ",
            " Cambio de alternador ",
            " Cambio de luces ",
            " Cambio de tablero del vehículo",
            "Instalación de scaner ",

        ],
        "General de Caja": [
            "Cambio de convertidor ",
            "Cambio de sincronizados ",
            "Cambio de flechas de trasmisión",
            "Cambio de filtro de aceite de caja",

        ],
        "Enderezado y Pintura": [
            "Enderezado de chasis ",
            "Cambio de bomper",
            "Cambio de parilla",
            "Enderezado de puertas",
            "Pintura general",
            "Pulido de espejos y faros",
            "Cambio de faldones",

        ],
        "Llanteria": [
            "Cambio de llanta",
            "Relación de fuga de llanta ",
            "Aliniado y balanceado",
            "Regulación de aire ",
        ],
    };

    rubroSelect.addEventListener('change', function() {
        const selectedRubro = rubroSelect.value;
        const servicios = serviciosPorRubro[selectedRubro];

        servicioSelect.innerHTML = ''; // Limpia las opciones actuales

        servicios.forEach(servicio => {
            const option = document.createElement('option');
            option.value = servicio;
            option.textContent = servicio;
            servicioSelect.appendChild(option);
        });
    });
    </script>





</x-app-layout>