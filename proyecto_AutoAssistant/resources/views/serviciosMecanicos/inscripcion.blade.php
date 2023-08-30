<style>
.container {
    background-color: #32525C;
    color: black;
    border-radius: 30px;
    padding: 20px;
    margin: 20px auto;
    max-width: 800px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group:last-child {
    margin-bottom: 0;
    /* Elimina el margen inferior del último elemento para evitar espacio extra */
}

input::placeholder {
    color: black;
}

label {
    font-size: 16px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
    padding-right: 15px;
    padding-left: 15px;
}

.col-md-2 {
    margin-bottom 0px;
}
</style>


<!-- ... Otros enlaces y estilos ... -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
<script src="https://cdn.jsdelivr.net/npm/datepicker@1.0.10/dist/datepicker.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion de servicios') }}
        </h2>
    </x-slot>
    <br>
    @if(auth()->user()->hasRole('taller_mecanico'))

    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data"
        class="container">
        <div class="row g-3">
            <div class="col-12">
                <h2 class="title text-white">Formulario de inscripción</h2>
            </div>
            @csrf
            <div class="col-md-2">
                <!-- Columna izquierda -->
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="nombreTaller" name="nombreTaller"
                        placeholder="Nombre del Taller" aria-label="First name" value="{{ old('nombreTaller') }}">
                    <label for="nombreTaller">Nombre del taller</label>
                    <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <label for="horario_inicio">Horario de Inicio</label>
                    <input type="datetime-local" class="form-control" id="fechaInicio" name="fechaInicio"
                        value="{{ old('fechaInicio') }}">
                    <x-input-error :messages="$errors->get('fechaInicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <label for="horario_fin">Horario de Fin</label>
                    <input type="datetime-local" class="form-control" id="fechaFin" name="fechaFin"
                        value="{{ old('fechaFin') }}">
                    <x-input-error :messages="$errors->get('fechaFin')" class="alert alert-danger" role="alert" />
                </div>

                <br>
                <div class="form-floating col-20">
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        placeholder="Direccion/Adomicilio" aria-label="Last name" value="{{ old('direccion') }}">
                    <label for="direccion">Direccion del Taller</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
                </div>
            </div>
            <div class="col-md-2">
                <!-- Columna derecha -->
                <div class=" form-floating col-md-12">
                    <input type="text" class="form-control" id="representante" name="representante"
                        placeholder="Nombre del propietario" aria-label="Last name" value="{{ old('representante') }}">
                    <label for="representante">Nombre del propietario</label>
                    <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
                </div>

                <br>
                <div class="form-floating col-12">
                    <input type="file" class="form-control" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                    <label for="logo">Logo</label>
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto"
                        placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*"
                        title="Ingresa un formato telefonico valido" aria-label="Last name"
                        value="{{ old('numeroContacto') }}">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert" />
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-6">
                <!-- Campos de la izquierda -->
                <!-- ... -->
                <div class="form-floating col-12">
                    <select id="rubro" name="rubro" class="form-select">
                        <option disabled selected>Rubro...</option>
                        <option value="Mecanico">Mecanico</option>
                        <option value="Lubricentro">Lubricentro</option>
                        <option value="Electronico">Electronico</option>
                        <option value="Enderezado y Pintura">Enderezado y Pintura</option>
                        <option value="General de Caja">General de Caja</option>
                        <option value="Llanteria">Llanteria</option>
                    </select>
                    <label for="rubro">Selecciona un Rubro</label>
                    <x-input-error :messages="$errors->get('rubro')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="servicio" name="servicio" class="form-select">
                        <option disabled selected>Servicio que Ofrece...</option>

                    </select>
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"
                        aria-label="Last name">{{ old('descripcion') }}</textarea>
                    <label for="descripcion">Descripcion del servicio</label>
                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="tipoServicio" name="tipoServicio" class="form-select">
                        <option disabled selected>Tipo Servicio...</option>
                        <option value="Adomicilio">Adomicilio</option>
                        <option value="Cita/Reserva">Cita/Reserva</option>
                    </select>
                    <label for="rubro">Selecciona un Tipo de Servicio</label>
                    <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="col-md-12">
                    <label for="acreditacion_1" class="form-label text-white">Imagen</label>
                    <input type="file" class="form-control" id="acreditacion_1" name="acreditacion_1"
                        accept=".png, .jpg, .jpeg">
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
            </div>

            <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Inscribir servicio</button>
                <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>

        </div>
        <br>
    </form>
    <script>
    $(document).ready(function() {

        $(".alert").delay(3500).slideUp(200, function() {
            $(this).alert('close');
        });

    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentDate = new Date();
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay()); // Primer día de la semana
        const endOfWeek = new Date(currentDate);
        endOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 6); // Último día de la semana

        const startDateFormatted = startOfWeek.toISOString().slice(0, 16); // Formato YYYY-MM-DDTHH:mm
        const endDateFormatted = endOfWeek.toISOString().slice(0, 16);

        const horarioInputs = document.querySelectorAll('input[type="datetime-local"]');

        horarioInputs.forEach(input => {
            input.setAttribute('min', startDateFormatted);
            input.setAttribute('max', endDateFormatted);
        });
    });
    </script>
    <script>
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
    document.addEventListener('DOMContentLoaded', function() {
        const rubroSelect = document.getElementById('rubro');
        const servicioSelect = document.getElementById('servicio');

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
    });
    </script>


    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data"
        class="container">
        <div class="row g-3">
            <div class="col-12">
                <h2 class="title text-white">Formulario de inscripción</h2>
            </div>
            @csrf
            <div class="col-md-2">
                <!-- Columna izquierda -->
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="nombreTaller" name="nombreTaller"
                        placeholder="Nombre del Taller" aria-label="First name" value="{{ old('nombreTaller') }}">
                    <label for="nombreTaller">Nombre del taller</label>
                    <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <label for="horario_inicio">Horario de Inicio</label>
                    <input type="datetime-local" class="form-control" id="fechaInicio" name="fechaInicio"
                        value="{{ old('fechaInicio') }}">
                    <x-input-error :messages="$errors->get('fechaInicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <label for="horario_fin">Horario de Fin</label>
                    <input type="datetime-local" class="form-control" id="fechaFin" name="fechaFin"
                        value="{{ old('fechaFin') }}">
                    <x-input-error :messages="$errors->get('fechaFin')" class="alert alert-danger" role="alert" />
                </div>

                <br>
                <div class="form-floating col-20">
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        placeholder="Direccion/Adomicilio" aria-label="Last name" value="{{ old('direccion') }}">
                    <label for="direccion">Direccion del Taller</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
                </div>
            </div>
            <div class="col-md-2">
                <!-- Columna derecha -->
                <div class=" form-floating col-md-12">
                    <input type="text" class="form-control" id="representante" name="representante"
                        placeholder="Nombre del propietario" aria-label="Last name" value="{{ old('representante') }}">
                    <label for="representante">Nombre del propietario</label>
                    <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
                </div>

                <br>
                <div class="form-floating col-12">
                    <input type="file" class="form-control" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                    <label for="logo">Logo</label>
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto"
                        placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*"
                        title="Ingresa un formato telefonico valido" aria-label="Last name"
                        value="{{ old('numeroContacto') }}">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert" />
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-6">
                <!-- Campos de la izquierda -->
                <!-- ... -->
                <div class="form-floating col-12">
                    <select id="rubro" name="rubro" class="form-select">
                        <option disabled selected>Rubro...</option>
                        <option value="Mecanico">Mecanico</option>
                        <option value="Lubricentro">Lubricentro</option>
                        <option value="Electronico">Electronico</option>
                        <option value="Enderezado y Pintura">Enderezado y Pintura</option>
                        <option value="General de Caja">General de Caja</option>
                        <option value="Llanteria">Llanteria</option>
                    </select>
                    <label for="rubro">Selecciona un Rubro</label>
                    <x-input-error :messages="$errors->get('rubro')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="servicio" name="servicio" class="form-select">
                        <option disabled selected>Servicio que Ofrece...</option>

                    </select>
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"
                        aria-label="Last name">{{ old('descripcion') }}</textarea>
                    <label for="descripcion">Descripcion del servicio</label>
                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="tipoServicio" name="tipoServicio" class="form-select">
                        <option disabled selected>Tipo Servicio...</option>
                        <option value="Adomicilio">Adomicilio</option>
                        <option value="Cita/Reserva">Cita/Reserva</option>
                    </select>
                    <label for="rubro">Selecciona un Tipo de Servicio</label>
                    <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert" />
                </div>
                <br>
                <div class="col-md-12">
                    <label for="acreditacion_1" class="form-label text-white">Imagen</label>
                    <input type="file" class="form-control" id="acreditacion_1" name="acreditacion_1"
                        accept=".png, .jpg, .jpeg">
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
            </div>

            <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Inscribir servicio</button>
                <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>

        </div>
        <br>
    </form>
    <script>
    $(document).ready(function() {

        $(".alert").delay(3500).slideUp(200, function() {
            $(this).alert('close');
        });

    });
    </script>
    </script>
    <script>
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
    document.addEventListener('DOMContentLoaded', function() {
        const rubroSelect = document.getElementById('rubro');
        const servicioSelect = document.getElementById('servicio');

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
    });
    </script>

    @endif

    <br>
</x-app-layout>