<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
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
            background-color: #000000;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon{
            text-align: center;
        
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
            border-radius: 20px;
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
<x-auth-session-status class="alert alert-primary" role="alert" :status="session('status')" />
    <div class="registration-form">
        <div class="form-icon">
                    <span><i class="icon icon-user"></i></span>
                
        </div>
        <div class="form-group">
                <h2 class="text-center text-white"> {{ __('Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}</h2>
            </div>
                @if (session('status') == 'verification-link-sent')
            <div class="form-group">
                <div class="alert alert-primary" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificacion a la direccion de correo electronico que proporciono durante el registro.') }}
                </div>
                
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf 
                <div>
                    <x-primary-button class="btn btn-block create-account">
                        {{ __('Reenviar la verificacion al correo') }}
                    </x-primary-button>
                </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-block create-account">
                {{ __('Cerrar') }}
            </button>
        </form>
        
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
</body>
</html>

