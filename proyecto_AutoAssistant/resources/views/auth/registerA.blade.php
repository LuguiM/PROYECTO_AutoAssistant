<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RegistroMecanico</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <style>
            body{
                background: rgb(0,0,0);
                background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(182,182,182,1) 100%);
            }
            .registration-form{
                padding: 50px 0;
            }
            .registration-form form{
                background-color: #242424;
                max-width: 600px;
                margin: auto;
                padding: 50px 70px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            }
            .registration-form .form-icon{
                text-align: center;
                /*background-color: #1279c1;*/
                border-radius: 50%;
                font-size: 40px;
                color: white;
                width: 100px;
                height: 100px;
                margin: auto;
                margin-bottom: 50px;
                line-height: 100px;
            }
            .registration-form .item{
                border-radius: 10px;
                margin-bottom: 25px;
                padding: 10px 20px;
            }
            .registration-form .create-account{
                border-radius: 30px;
                padding: 10px 20px;
                font-size: 18px;
                font-weight: bold;
                background-color: #1279c1;
                border: none;
                color: white;
                margin-top: 20px;
            }
            .registration-form .social-media{
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
            .registration-form .social-icons{
                margin-top: 30px;
                margin-bottom: 16px;
            }
            .registration-form .social-icons a{
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
            .registration-form .social-icons a:hover{
                text-decoration: none;
                opacity: 0.6;
            }
            @media (max-width: 576px) {
                .registration-form form{
                    padding: 50px 20px;
                }

                .registration-form .form-icon{
                    width: 70px;
                    height: 70px;
                    font-size: 30px;
                    line-height: 70px;
                }
            }
            .img_logo{
                width: 115px;
                height: 150px;
                margin: auto;
                margin-bottom: 50px;
                line-height: 100px;
            }
        </style>

    </head>
    <body>
        <div class="registration-form">
            <form method="POST" action="{{ route('registerMecanico') }}">
                @csrf
                <div class="form-icon">
                    <img src="\imagenes\Logo.png" alt="logo" class="img_logo"></img>
                </div>
                <div class="form-group">
                    <h2 class="text-center text-white">CREACION DE CUENTA</h2>
                </div>
                <div class="form-group">
                    <input id="name" type="text" class="form-control item" placeholder="Nombre" name="name" :value="old('name')" required autofocus autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('name')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <input id="edad" type="text" class="form-control item" placeholder="Edad" name="edad" :value="old('edad')" required autocomplete="edad">
                    @error('edad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('edad')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">¿Como se identifica?</label>
                        </div>
                        <select class="custom-select" id="rol" name="rol" required>
                            <option selected>Seleccione una Opcion</option>
                            <option value="taller_mecanico">Taller Mecanico</option>
                            <option value="mecanico_independiente">Mecanico Independiente</option>
                        </select>
                    </div>
                    @error('rol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('rol')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control item" placeholder="Correo" name="email" :value="old('email')" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('email')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control item" placeholder="Contraseña" name="password" title="La contraseña debe contener mas de 8 caracteres." required pattern="[A-Za-z0-9]{8,}" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control item" placeholder="Confirmar Contraseña" name="password_confirmation" title="La contraseña debe contener mas de 8 caracteres." required pattern="[A-Za-z0-9]{8,}" autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <x-input-error :messages="$errors->get('password_confirmation')" class="alert alert-danger" role="alert" />
                </div>
                <div class="form-group">
                    <x-primary-button class="btn btn-block create-account">
                        {{ __('registrar')}}
                    </x-primary-button>
                </div>
                <span class="ml-auto text-white">¿YA TIENES CUENTA? <a href="{{ route('login') }}" class="forgot-pass ">INICIA SESION</a></span>
            </form>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>