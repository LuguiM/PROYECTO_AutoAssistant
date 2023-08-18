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
        margin-bottom: 0; /* Elimina el margen inferior del último elemento para evitar espacio extra */
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
<head>
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

    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data" class="container">
    <div class="row g-3">
        <div class="col-12">
            <h2 class="title text-white">Formulario de inscripción</h2>
        </div>
        @csrf
        <div class="col-md-2">
            <!-- Columna izquierda -->
            <div class="form-floating col-md-12">
                <input type="text" class="form-control" id="nombreTaller" name="nombreTaller" placeholder="Nombre del Taller" aria-label="First name" value="{{ old('nombreTaller') }}">
                <label for="nombreTaller">Nombre del taller</label>
                <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert"/>
            </div>
            <br>
            <div class="form-floating col-md-12">
    <label for="horario_inicio">Horario de Inicio</label>
    <input type="datetime-local" class="form-control" id="horario" name="horario" value="{{ old('horario_inicio') }}">
    <x-input-error :messages="$errors->get('horario_inicio')" class="alert alert-danger" role="alert"/>
</div>
<br>
<div class="form-floating col-md-12">
    <label for="horario_fin">Horario de Fin</label>
    <input type="datetime-local" class="form-control" id="horario2" name="horario2" value="{{ old('horario_fin') }}">
    <x-input-error :messages="$errors->get('horario_fin')" class="alert alert-danger" role="alert"/>
</div>

                <br>
                <div class="form-floating col-20">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion/Adomicilio" aria-label="Last name" value="{{ old('direccion') }}">
                    <label for="direccion">Direccion del Taller</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert"/>
                </div>
        </div>
        <div class="col-md-2">
            <!-- Columna derecha -->
            <div class=" form-floating col-md-12">
                <input type="text" class="form-control" id="representante" name="representante" placeholder="Nombre del propietario" aria-label="Last name" value="{{ old('representante') }}">
                <label for="representante">Nombre del propietario</label>
                <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert"/>
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
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert"/>
                </div>
                <br>
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto" placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido" aria-label="Last name" value="{{ old('numeroContacto') }}">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert"/>
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
                    <x-input-error :messages="$errors->get('rubro')" class="alert alert-danger" role="alert"/>
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="servicio" name="servicio" class="form-select">
                        <option disabled selected>Servicio que Ofrece...</option>
                        <option value="ACambio de bujías.">Cambio de bujías.</option>
                        <option value="Cambio de aceite y filtro.">Cambio de aceite y filtro.</option>
                        <option value="Cambio del filtro de gasolina y aire.">Cambio del filtro de gasolina y aire.</option>
                        <option value="Cambio del refrigerante.">Cambio del refrigerante.</option>
                        <option value="Cambio de la faja del alternador.">Cambio de la faja del alternador.</option>
                        <option value="Ajuste del tiempo de encendido.">Ajuste del tiempo de encendido.</option>
                        <option value="Revisión de las luces y los faros.">Revisión de las luces y los faros.</option>
                        <option value="Instalación de batería auxiliar.">Instalación de batería auxiliar.</option>
                        <option value="Revisión de vehículos.">Revisión de vehículos.</option>
                        <option value="Electrónica del automóvil.">Electrónica del automóvil.</option>
                        <option value="Reprogramacions y configuracion de (UCES)">Reprogramacions y configuracion de (UCES)</option>
                        <option value="Vehiculo de cortesia. ">Vehiculo de cortesia. </option>
                        <option value="Antirradares - Detectores radar. ">Antirradares - Detectores radar. </option>
                        <option value="Climatización de vehículos.">Climatización de vehículos.</option>
                    </select>
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert"/>
                </div>
                <br>
                <div class="form-floating col-12">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Last name">{{ old('descripcion') }}</textarea>
                    <label for="descripcion">Descripcion del servicio</label>
                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert"/>
                </div>
                <br>
                <div class="form-floating col-12">
                    <select id="tipoServicio" name="tipoServicio" class="form-select">
                        <option disabled selected>Tipo Servicio...</option>
                        <option value="Adomicilio">Adomicilio</option>
                        <option value="Cita/Reserva">Cita/Reserva</option>
                    </select>
                    <label for="rubro">Selecciona un Tipo de Servicio</label>
                    <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert"/>
                </div>
                <br>
                <div class="col-md-12">
                    <label for="acreditacion_1" class="form-label text-white">Imagen</label>
                    <input type="file" class="form-control" id="acreditacion_1"  name="acreditacion_1" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert"/>
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
    document.addEventListener('DOMContentLoaded', function () {
        const horarioInputs = document.querySelectorAll('input[type="datetime-local"]');
        const currentDate = new Date(); // Obtén la fecha actual
        
        horarioInputs.forEach(input => {
            const minDateFormatted = currentDate.toISOString().slice(0, 16); // Formato YYYY-MM-DDTHH:mm
            input.setAttribute('min', minDateFormatted);
        });
    });
</script>
</head>
    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
        <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data" class="container">
            <div class="row g-3">
                <div class="col-12">
                    <h2 class="title text-white">Formulario de inscripcion</h2>
                </div>
                @csrf
                <div class="col-md-6">
                    <!-- Campos de la izquierda -->
                    <!-- ... -->
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="representante" name="representante" placeholder="Nombre del propietario" aria-label="Last name" value="{{ old('representante') }}">
                    <label for="propietario">Nombre del Representante</label>
                    <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-12">
                    <textarea class="form-control" id="horario" name="horario" placeholder="Horario de Atencion" aria-label="Last name">{{ old('horario') }}</textarea>
                    <label for="horario">Horario de Atencion</label>
                    <x-input-error :messages="$errors->get('horario')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto" placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido" aria-label="Last name" value="{{ old('numeroContacto') }}">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12">
                    <label for="logo" class="form-label text-white">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion/Adomicilio" aria-label="Last name" value="{{ old('direccion') }}">
                    <label for="direccion">Direccion</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert"/>
                </div>
                </div>
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
                    <x-input-error :messages="$errors->get('rubro')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Servicio que Ofrece" required aria-label="Last name" value="{{ old('servicio') }}">
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Last name">{{ old('descripcion') }}</textarea>
                    <label for="descripcion">Descripcion del servicio</label>
                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <select id="tipoServicio" name="tipoServicio" class="form-select">
                        <option disabled selected>Tipo Servicio...</option>
                        <option value="Adomicilio">Adomicilio</option>
                        <option value="Cita/Reserva">Cita/Reserva</option>
                    </select>
                    <label for="rubro">Selecciona un Tipo de Servicio</label>
                    <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-12">
                    <label for="acreditacion_1" class="form-label text-white">Acreditacion 1</label>
                    <input type="file" class="form-control" id="acreditacion_1"  name="acreditacion_1" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-12">
                    <label for="acreditacion_2" class="form-label text-white">Acreditacion 2</label>
                    <input type="file" class="form-control" id="acreditacion_2"  name="acreditacion_2" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_2')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-12">
                    <label for="acreditacion_3" class="form-label text-white">Acreditacion 3</label>
                    <input type="file" class="form-control" id="acreditacion_3"  name="acreditacion_3" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_3')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-12">
                    <label for="acreditacion_4" class="form-label text-white">Acreditacion 4</label>
                    <input type="file" class="form-control" id="acreditacion_4"  name="acreditacion_4" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_4')" class="alert alert-danger" role="alert"/>
                </div>
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
                    <button type="submit" class="btn btn-primary">Inscribir servicio</button>
                    <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
            <br>
        </form>
    @endif

    <br>
</x-app-layout>