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
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion de servicios') }}
        </h2>
    </x-slot>
    <br>
    @if(auth()->user()->hasRole('taller_mecanico'))

        <form method="POST" class="container">
            <div class="row g-3">
                <div class="col-12">
                    <h2 class="title text-white">Formulario de inscripcion</h2>
                </div>
               
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="nombreTaller" name="nombreTaller" placeholder="Nombre del Taller" aria-label="First name">
                    <label for="nombreTaller">Nombre del taller</label>
                    <x-input-error :messages="$errors->get('nombreTaller')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="propietario" name="propietario" placeholder="Nombre del propietario" aria-label="Last name">
                    <label for="propietario">Nombre del propietario</label>
                    <x-input-error :messages="$errors->get('propietario')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <textarea class="form-control" id="horario" name="horario" placeholder="Horario de Atencion" aria-label="Last name"></textarea>
                    <label for="horario">Horario de Atencion</label>
                    <x-input-error :messages="$errors->get('horario')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-md-6">
                    <input type="text" class="form-control" id="numeroContacto" naem="numeroContacto" placeholder="Numero de Contacto" aria-label="Last name">
                    <label for="numeroContacto">Numero de Contacto</label>
                    <x-input-error :messages="$errors->get('numeroContacto')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Last name"></textarea>
                    <label for="descripcion">Descripcion</label>
                    <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12">
                    <label for="logo" class="form-label text-white">Logo</label>
                    <input type="file" class="form-control" placeholder="Logo" id="logo" name="logo">
                    <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <select id="rubro" name="rubro" class="form-select">
                        <option selected>Rubro...</option>
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
                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Servicio que Ofrece" aria-label="Last name">
                    <label for="servicio">Servicio que Ofrece</label>
                    <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="form-floating col-12">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion/Adomicilio" aria-label="Last name">
                    <label for="direccion">Direccion del Taller</label>
                    <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12">
                    <label for="acreditaciones" class="form-label text-white">Acreditaciones</label>
                    <input type="file" class="form-control" id="acreditaciones"  name="acreditaciones" placeholder="Acreditaciones" aria-label="Last name">
                    <x-input-error :messages="$errors->get('acreditaciones')" class="alert alert-danger" role="alert"/>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <a href="{{url('/inscripcion')}}" class="btn btn-primary">Inscribir servicio</a>
                    <a href="{{url('/requisitos')}}" class="btn btn-danger">Cancelar</a>
                </div>

            </div>
            <br>
        </form>    
    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
        <div class="row">

        </div>       
    @endif
    
    

    <br>

    
</x-app-layout>
