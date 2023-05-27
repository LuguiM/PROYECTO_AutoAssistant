<style>
.container {
  
  padding: 20px;
  color: #242424;
}

.title {
  margin-bottom: 20px;
}

.requirements {
  font-size: 19px;
  list-style: none;
  padding-left: 0;
  color: #242424;
}

.requirements li{
    background-color: #d9d9d9;
}


</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Requisitos') }}
        </h2>
    </x-slot>
    <br>
    @if(auth()->user()->hasRole('taller_mecanico'))
        <div class="row">
            <h2 class="title text-white">Requisitos de Incripcion de Servicios Mecanicos</h2>
            <div class="container">
                <ol class="list-group list-group-numbered requirements">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Licencia de Actividad</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Razon Social</div>
                        Content for list item
                        </div>
                        <span class="badge bg-success rounded-pill">Opcional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Rubro</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Dueño o representante</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Categoria</div>
                        Content for list item
                        </div>
                        <span class="badge bg-success rounded-pill">Opcional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Acreditaciones</div>
                        Content for list item
                        </div>
                        <span class="badge bg-success rounded-pill">Opcional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Logo</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                </ol>
                    
            </div>
        </div>              
    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
        <div class="row">
            <h2 class="title text-white">Requisitos de Incripcion de Servicios Mecanicos</h2>

            <div class="container">
                <ol class="list-group list-group-numbered requirements">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Rubro</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Dueño o representante</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Categoria</div>
                        Content for list item
                        </div>
                        <span class="badge bg-success rounded-pill">Opcional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Acreditaciones</div>
                        Content for list item
                        </div>
                        <span class="badge bg-success rounded-pill">Opcional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Logo</div>
                        Content for list item
                        </div>
                        <span class="badge bg-danger rounded-pill">Obligatorio</span>
                    </li>
                </ol>
                    
            </div>
        </div>              
    @endif
    
    <br>
    <div class="row">
        <a href="{{url('/welcome')}}" class="btn btn-primary">Inscribir servicio</a>
    </div>

    <br>

    <div class="row">
        <h2 class="title text-white">No se encuentran servicios inscritos actualmente</h2>
    </div>
</x-app-layout>
