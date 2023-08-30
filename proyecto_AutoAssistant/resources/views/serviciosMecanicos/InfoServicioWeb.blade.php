@extends('sitioweb')

@section('content')
<html lang="en">
<style>
.container {
    max-width: 1200px;
    /* Cambia este valor al ancho deseado en píxeles */
    margin: 0 auto;
    /* Centra el contenido horizontalmente */
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

.cudro {
    color: #fff;
    border: 1px solid #000;
}

.image-container {
    width: 20px;
    height: 20px;
    background-image: ('imagenes\chack.png');
    /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta real de tu imagen */
    background-size: cover;
    /* Ajusta la imagen para cubrir todo el contenedor */
    background-position: left;
    /* Centra la imagen en el contenedor */
}
</style>
<main class=" background-image">
    <div class="row">
        <div class="container">
            <details class="accordion" open>
                <summary class="accordion-header h3 text-white">Requisitos de Mecánicos</summary>
                <div style="border: 1px solid #ccc; margin: 20px 0;" class="accordion-content">
                    <ol class="list-group list-group-numbered requirements">
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Nombre del
                                taller.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class=" list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">

                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Dueño o
                                representante.</img>


                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Rubro.</img>

                            </div>

                        </li>

                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Dirección.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Servicios que
                                ofrecen.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Descripción del
                                servicio.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Tipo de
                                servicio.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Horario de
                                atención.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Número de
                                contacto.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30" class="fw-bold">Logo o imagen del
                                servicio.</img>

                            </div>

                        </li>
                        <li style="border: 5px solid #ccc;"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <img src="\imagenes\chack.png" width="30" height="30"
                                    class="fw-bold">Acreditaciones.</img>

                            </div>

                        </li>
                    </ol>
                </div>
            </details>

            <div class="centrado">

                <a href="{{ route('registerMecanico') }}" class="btn btn-primary btn-lg"><i
                        class='bx bx-plus-circle'></i>
                    Inscribir servicio mecanico</a>

            </div>


            @endsection