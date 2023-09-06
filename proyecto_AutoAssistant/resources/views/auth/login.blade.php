<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

    body {
        background: rgb(0, 0, 0);
        background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(182, 182, 182, 1) 100%);
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        font-family: 'Inder', sans-serif;
    }

    .registration-form {
        padding: 50px 0;
    }

    .registration-form form {
        background-color: #000000;
        max-width: 600px;
        margin: auto;
        padding: 50px 70px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .form-icon {
        text-align: center;
        border-radius: 50%;
        font-size: 46px;
        color: white;
        width: 100px;
        height: 100px;
        margin: auto;
        margin-bottom: 50px;
        line-height: 100px;
    }

    .registration-form .item {
        border-radius: 20px;
        margin-bottom: 25px;
        padding: 10px 20px;
        font-size: 20px;
    }

    .registration-form .create-account {
        border-radius: 30px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #1279c1;
        border: none;
        color: white;
        margin-top: 20px;
    }

    .registration-form .social-media {
        max-width: 600px;
        background-color: #fff;
        margin: auto;
        padding: 35px 0;
        text-align: center;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        color: #1279c1;
        border-top: 1px solid #dee9ff;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .social-icons {
        margin-top: 30px;
        margin-bottom: 16px;
    }

    .registration-form .social-icons a {
        font-size: 23px;
        margin: 0 3px;
        color: #1279c1;
        border: 1px solid;
        border-radius: 50%;
        width: 45px;
        display: inline-block;
        height: 45px;
        text-align: center;
        background-color: #fff;
        line-height: 45px;
    }

    .registration-form .social-icons a:hover {
        text-decoration: none;
        opacity: 0.6;
    }

    @media (max-width: 576px) {
        .registration-form form {
            padding: 50px 20px;
        }

        .registration-form .form-icon {
            width: 70px;
            height: 70px;
            font-size: 30px;
            line-height: 70px;
        }
    }

    .img_logo {
        width: 115px;
        height: 150px;
        margin: auto;
        margin-bottom: 50px;

        line-height: 100px;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 999;
        /* Asegura que esté encima del contenido */
    }

    .back-button-container {
        position: relative;
        /* Asegura que el botón de atrás esté dentro de este contenedor */
    }

    .nav-link {
        background-color: #00000;
        display: block;
        padding: 0.5rem;
        color: #FFFFFF;
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        border-radius: 1rem;
        /* Redondear todos los lados */
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
    </style>
</head>

<body class="background-image">
    <x-auth-session-status class="alert alert-primary" role="alert" :status="session('status')" />
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="registration-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="back-button-container">
                <!-- Botón de atrás -->
                <div
                    style="margin: 10px; flex: 1 1 300px; max-width: 300px; margin-right: 290px; font-size: 20px; margin-bottom: 5px">
                    <a class="nav-link nav-user-img small" href="inicio"><span class="login">Atras</span></a>
                </div>
            </div>
            <div class="form-icon">
                <img src="\imagenes\Logo.png" atl="logo" class="img_logo"></img>
            </div>
            <div class="form-group">
                <h2 class="text-center text-white">INICIAR SESION</h2>

            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Correo" name="email"
                    :value="old('email')" required autofocus autocomplete="email">
                @if($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Ingrese Contraseña"
                    name="password" title="La contraseña debe contener mas de 8 caracteres." required
                    pattern="[A-Za-z0-9]{8,}" autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-group">
                <x-primary-button class="btn btn-block create-account">
                    {{ __('Iniciar Sesion') }}
                </x-primary-button>

            </div>

            <div class="d-flex mb-5 align-items-center">
                <label for="remember_me" class="control control--checkbox mb-0"><span
                        class="caption text-white">{{ __('Recuerdame') }}</span>
                    <input id="remember_me" type="checkbox" name="remember" />
                    <div class="control__indicator"></div>
                </label>
                @if (Route::has('password.request'))
                <span class="ml-auto">
                    <a href="{{ route('password.request') }}" class="forgot-pass text-white">Contraseña
                        Olvidada?</a></span>
                @endif

            </div>
            <span class="ml-auto text-white">¿NO TIENES CUENTA? <a href="{{ route('opcionesRegistro') }}"
                    class="forgot-pass ">Crear Cuenta</a></span>
        </form>

        <div class="social-media">
            <h5>INICIA SESION CON GOOGLE</h5>
            <div class="social-icons">
                <a href="/google-auth/redirect"><i class="icon-social-google" title="Google"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {

        $(".alert").delay(3500).slideUp(200, function() {
            $(this).alert('close');
        });

    });
    </script>
    <script>
    $(document).ready(function() {
        $('#birth-date').mask('00/00/0000');
        $('#phone-number').mask('0000-0000');
    })
    </script>
</body>

</html>