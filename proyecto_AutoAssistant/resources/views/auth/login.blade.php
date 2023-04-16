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
    background-color: #333333;
}

.registration-form{
	padding: 50px 0;
}

.registration-form form{
    background-color: #1279c1;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
	text-align: center;
    background-color: #ed3926;
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
    background-color: #ed3926;
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
    color: #ed3926;
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
    color: #ed3926;
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
    </style>
</head>
<body>
<x-auth-session-status class="alert alert-primary" role="alert" :status="session('status')" />
    <div class="registration-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf   
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
             
            </div>
            <div class="form-group">
                <h2 class="text-center text-white">INICIAR SESION</h2>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Correo" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="alert alert-danger" role="alert"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Ingrese Contraseña" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />
            </div>
            <div class="form-group">
                <x-primary-button class="btn btn-block create-account">
                    {{ __('Log in') }}
                </x-primary-button>    
            
            </div>

            <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption text-white">{{ __('Remember me') }}</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                    @if (Route::has('password.request'))
                    <span class="ml-auto">
                        <a href="{{ route('password.request') }}" class="forgot-pass text-white">Forgot Password</a></span> 
                    @endif
                   
            </div>
            <span class="ml-auto text-white">¿NO TIENES CUENTA? <a href="{{ route('register') }}" class="forgot-pass ">Crear Cuenta</a></span>
        </form>
        
        <div class="social-media">
            <h5>INICIA SESION CON GOOGLE</h5>
            <div class="social-icons">
                <a href="/google-auth/redirect"><i class="icon-social-google" title="Google"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#birth-date').mask('00/00/0000');
        $('#phone-number').mask('0000-0000');
        }) 
    </script>
</body>
</html>