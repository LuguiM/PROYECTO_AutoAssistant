<style>
    .container {
       background-color: #32525C;
       color:black;
       border-top-left-radius: 30px;
       border-top-right-radius: 30px;
       border-bottom-left-radius: 30px;
       border-bottom-right-radius: 30px;
    }
    input::placeholder{
        color: black;
    }
    label{
        font-size:16px;
    }
</style>

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
                    <h2 class="title text-white">Formulario de inscripcion</h2>
                </div>
                @csrf
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="nombreTaller" name="nombreTaller" placeholder="Nombre del Taller" aria-label="First name">
                    <label for="nombreTaller">Nombre del taller</label>
                    <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="representante" name="representante" placeholder="Nombre del propietario" aria-label="Last name">
                    <label for="propietario">Nombre del propietario</label>
                    <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <textarea class="form-control" id="horario" name="horario" placeholder="Horario de Atencion" aria-label="Last name"></textarea>
                    <label for="horario">Horario de Atencion</label>
                    <x-input-error :messages="$errors->get('horario')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto" placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido" aria-label="Last name">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12">
                    <label for="logo" class="form-label text-white">Logo</label>
                    <input type="file" class="form-control" placeholder="Logo" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion/Adomicilio" aria-label="Last name">
                    <label for="direccion">Direccion del Taller</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert"/>
                </div>
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
                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Servicio que Ofrece" required aria-label="Last name">
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Last name"></textarea>
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
                <div class="col-md-6">
                    <label for="acreditacion_1" class="form-label text-white">Acreditacion 1</label>
                    <input type="file" class="form-control" id="acreditacion_1"  name="acreditacion_1" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_2" class="form-label text-white">Acreditacion 2</label>
                    <input type="file" class="form-control" id="acreditacion_2"  name="acreditacion_2" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_2')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_3" class="form-label text-white">Acreditacion 3</label>
                    <input type="file" class="form-control" id="acreditacion_3"  name="acreditacion_3" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_3')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_4" class="form-label text-white">Acreditacion 4</label>
                    <input type="file" class="form-control" id="acreditacion_4"  name="acreditacion_4" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_4')" class="alert alert-danger" role="alert"/>
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

    @if(auth()->user()->hasRole('mecanico_independiente'))
    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data" class="container">
            <div class="row g-3">
                <div class="col-12">
                    <h2 class="title text-white">Formulario de inscripcion</h2>
                </div>
                @csrf
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="representante" name="representante" placeholder="Nombre del propietario" aria-label="Last name">
                    <label for="propietario">Nombre del Representante</label>
                    <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <textarea class="form-control" id="horario" name="horario" placeholder="Horario de Atencion" aria-label="Last name"></textarea>
                    <label for="horario">Horario de Atencion</label>
                    <x-input-error :messages="$errors->get('horario')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="numeroContacto" name="numeroContacto" placeholder="Numero de Contacto" inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido" aria-label="Last name">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12">
                    <label for="logo" class="form-label text-white">Logo</label>
                    <input type="file" class="form-control" placeholder="Logo" id="logo" name="logo" accept=".png, .jpg, .jpeg">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion/Adomicilio" aria-label="Last name">
                    <label for="direccion">Direccion</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert"/>
                </div>
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
                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Servicio que Ofrece" required aria-label="Last name">
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Last name"></textarea>
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
                <div class="col-md-6">
                    <label for="acreditacion_1" class="form-label text-white">Acreditacion 1</label>
                    <input type="file" class="form-control" id="acreditacion_1"  name="acreditacion_1" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_1')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_2" class="form-label text-white">Acreditacion 2</label>
                    <input type="file" class="form-control" id="acreditacion_2"  name="acreditacion_2" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_2')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_3" class="form-label text-white">Acreditacion 3</label>
                    <input type="file" class="form-control" id="acreditacion_3"  name="acreditacion_3" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_3')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-md-6">
                    <label for="acreditacion_4" class="form-label text-white">Acreditacion 4</label>
                    <input type="file" class="form-control" id="acreditacion_4"  name="acreditacion_4" placeholder="Acreditaciones" accept=".png, .jpg, .jpeg">
                    <x-input-error :messages="$errors->get('acreditacion_4')" class="alert alert-danger" role="alert"/>
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
<script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

            // Realiza cualquier validación adicional que necesites aquí

            // Mostrar notificación de éxito después de 5 segundos
            alertify.success('¡Servicio inscrito con éxito!');
            setTimeout(function() {
                document.getElementById('myForm').submit();
            }, 1000);
        });
    </script>
