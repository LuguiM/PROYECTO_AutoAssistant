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

.accordion {
  margin-bottom: 20px;
}

.accordion-header {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  cursor: pointer;
}

.accordion-content {
  background-color: #d9d9d9;
  padding: 10px;
}


</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Mecanicos') }}
        </h2>
    </x-slot>
    <br>
    @if(auth()->user()->hasRole('taller_mecanico'))
        
        <div class="row">
            <div class="container">
                <details class="accordion" open>
                    <summary class="accordion-header h2 text-white">Requisitos de Mecanicos</summary>
                    <div class="accordion-content">
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
                </details>
                <div class="row">
                    <a href="{{url('/inscripcion')}}" class="btn btn-primary btn-lg">Inscribir servicio</a>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->hasRole('mecanico_independiente'))
        <div class="row">
            <div class="container">
                <details class="accordion" open>
                    <summary class="accordion-header h2 text-white">Requisitos de Mecanicos</summary>
                    <div class="accordion-content">
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
                </details>
                <div class="row">
                    <a href="{{url('/inscripcion')}}" class="btn btn-primary btn-lg">Inscribir servicio</a>
                </div>
            </div>
        </div>       
    @endif
    

    <br>

    <div class="row">
        <h2 class="title text-white">No se encuentran servicios inscritos actualmente</h2>
    </div>

</x-app-layout>
<script>
  function toggleAccordion() {
    const accordion = document.querySelector('.accordion');
    accordion.toggleAttribute('open');
  }
</script>
