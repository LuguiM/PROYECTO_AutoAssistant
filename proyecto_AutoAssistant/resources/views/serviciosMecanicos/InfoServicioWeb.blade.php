@extends('sitioweb')

@section('content')
<html lang="en">
<style>
  
    .container {
        max-width: 1200px; /* Cambia este valor al ancho deseado en píxeles */
        margin: 0 auto; /* Centra el contenido horizontalmente */
        padding: 20px;
        color: #242424;
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
    .centrado {
  text-align: center;
}
.boton {
  display: inline-block;
  padding: 20px 70px;
  background-color: #3498db;
  color: #fff;
  text-decoration: none;
  border-radius: 50px;
  margin-top: 50px;
}     
.background-image {
        background-image: url('/imagenes/fondo4.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>
<main class=" background-image">
<div class="row">
            <div class="container">
                    <summary class="accordion-header h3 text-white">Requisitos de Mecanicos</summary>
                    <div class="accordion-content">
                        <ol class="list-group list-group-numbered requirements">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Nombre del taller</div>
                                Nombre del taller mecanico para identificarse.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Dueño o representante</div>
                                Nombre del dueño o un representante del taller.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Rubro</div>
                                Area en la que trabajaran.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Direccion</div>
                                Direccion del taller mecanico y funtos de referencias.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Servicios que ofrecen</div>
                                Nombre del servicio que ofrece el taller.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Descripcion del servicio</div>
                                Breve descripcion sobre el servicio que se brinda.
                                </div>
                                <span class="badge bg-success rounded-pill">Opcional</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Tipo de servicio</div>
                                El tipo de servicio que ofrecera ya sea adomicilio o con citas previas.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Horario de atencion</div>
                                Horarios de atencion a clientes.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Numero de contacto</div>
                                Numero telefonico para contactar.
                                </div>
                                <span class="badge bg-success rounded-pill">Opcional</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Logo o imagen del servicio</div>
                                Logotipo que represente el taller o una imagen que represente el servicio.
                                </div>
                                <span class="badge bg-danger rounded-pill">Obligatorio</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Acreditaciones</div>
                                Imagenes de certificaciones, especializaciones o reconocimientos, MAXIMO 4. 
                                </div>
                                <span class="badge bg-success rounded-pill">Opcional</span>
                            </li>
                        </ol>
                    </div>
                </details>
  
            <div class="centrado">
                <a href="registerMecanico" class="boton">INSCRIBIR UN SERVICIO</a>
            </div>
           

@endsection




