<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opciones de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/imagenes/Logo.png" />
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

    html,
    body {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body {
        background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(182, 182, 182, 1) 100%);
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        height: 2000px;
        /* Establece un ancho máximo para el cuerpo de la página */
        margin: 0 auto;
        /* Centra el cuerpo de la página horizontalmente */
        padding: 20px;
        /* Agrega un espacio de relleno alrededor del contenido */
    }

    .card-container {


        max-width: 600px;


    }

    .card {
        border-radius: 1rem;
        font-size: 40px;
    }

    .card-body {
        border-radius: 1rem;
        background-color: black;
    }

    .card-text {
        color: #FFFFFF;
        margin-bottom: 50px;
        margin-top: 0px;
    }

    .option-box,
    .option-box1 {
        font-size: 25px;
        padding: 0.1px;
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        border-radius: 1rem;
        /* Redondear todos los lados */
    }

    .nav-link {
        background-color: #0d6efd;
        display: block;
        padding: 0.5rem;
        color: #FFFFFF;
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        border-radius: 1rem;
        /* Redondear todos los lados */
    }

    .nav-link1 {
        background-color: #000;
        display: block;
        padding: 0.5rem;
        color: #FFFFFF;
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        border-radius: 1rem;
        /* Redondear todos los lados */
    }

    .option-box:first-child {
        border-top-right-radius: 0;
        /* Eliminar redondeo en la esquina superior derecha */
        border-bottom-right-radius: 0;
        /* Eliminar redondeo en la esquina inferior derecha */
    }

    .background-image {
        background-image: url('/imagenes/fondo4.jpg');


        background-size: 100% 100%;
        /* Cambiamos el tamaño para que cubra todo el espacio */


        background-position: 0 0;
        /* Cambiamos la posición a la esquina superior izquierda */
        width: 170vh;
        height: sticky;
        background-attachment: fixed;
    }

    .option-box:last-child {
        border-top-left-radius: 0;
        /* Eliminar redondeo en la esquina superior izquierda */
        border-bottom-left-radius: 0;
        /* Eliminar redondeo en la esquina inferior izquierda */
    }
    </style>
</head>

<body class="background-image">
    <div class="card-container">
        <div class="card text-center">
            <div class="card-body">

                <div
                    style="margin: 10px; flex: 1 1 300px; max-width: 300px; margin-right: 290px; font-size: 20px; margin-bottom: 5px">
                    <a class="nav-link1 nav-user-img small" href="inicio"><span class="login">Atras</span></a>
                </div>
                <img src="/imagenes/Logo.png" alt="Logo" class="logo" width="250px" height="250px">
                <p class="card-text">Opciones de registro.</p>

                <div class="option-box">
                    <a class="nav-link nav-user-img small" href="{{ route('register') }}"><span
                            class="register">Conductor y
                            Fututuro Conductor</span></a>
                </div>
                <p></p>
                <div class="option-box1">
                    <a class="nav-link nav-user-img small" href="{{ route('registerMecanico') }}"><span
                            class="login">Taller
                            Mecanico y Mecanicos Independientes</span></a>
                </div>
                <p></p>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>