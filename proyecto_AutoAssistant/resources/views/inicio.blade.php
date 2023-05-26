@extends('sitioweb')

@section('content')
<html>
<head>
    <title>AutoAssistant</title>
    <link rel="stylesheet" href="{{ asset('css/ani.css') }}">
    <style>
         body {
            background-image: url('/imagenes/fondo3.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
          
        }
        .footer-content {
            background-color: #32525C;
        }

        .box-container {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            justify-content: center;
        }
        .box-container2 {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
           
        }
        .box-container2 {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        }

        .box2, .box, .box3 {
        background-color: #fff;
        margin: 10px;
        padding: 20px;
        flex: 1 1 300px;
        max-width: 300px;
        border-radius: 10px;
        border: 2px solid #000;
        }
    </style>
</head>
<body style="background: url('/imagenes/fondo3.png') no-repeat center center fixed; background-size: cover;">
    <div style="text-align: center;">
        <div style="display: inline-block;">
            <img src="/imagenes/Logo.png" width="350" height="350" alt="Logo de la empresa" class="logo" style="margin: 5px; margin-top: 150px;margin-right: 30px;">
        </div>
        <div style="display: inline-block; vertical-align: top; margin-left: 30px;">
            <div style="font-size: 40px; color: #fff; width: 350px; height: 150px; padding: 10px; margin-top: 270px;">
                <p><a style="color: #fff; text-decoration: none;">¿Necesitas ayuda con tu vehiculo?</a></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box1" style="background-color: transparent;margin-top: 250px">
        <p style="text-align: center; font-size: 2.25rem; font-weight: 300; line-height: 1.2; color: #FFF">| Descripción de la aplicación Autoassistant |</p>
            <h2 style="font-size: 30px; color: #1279C1;">Tu mecanico virtual con las funciones que te ayudarán a solucionar las problemáticas de tu vehículo, brindándote funciones en las que puedas acceder a la información que brinda para los conductores y el registro o ingreso para talleres mecánicos o mecánicos independientes para que puedan inscribirse y poder ofrecer servicios a los conductores.</h2>
        </div>
    </div>
    <div  style="text-align: center; margin-top: 40px;">
        <img id="nosotros" src="/imagenes/logoequipo.png" width="330" height="200" alt="Logo de la empresa"  style="margin-top: 300px; margin-bottom: 100px;margin-right: 30px">
    </div>
    <div class="container">
    <p style="text-align: center; font-size: 2.25rem; font-weight: 300; line-height: 1.2; color: #FFF">| SOBRE NOSOTROS |</p>
        <div class="box1 animated fadeIn" style="margin-bottom: 200px; background-color:  transparent;">
            <h2 style="font-size: 30px; color: #1279C1;">Descripción general sobre nosotros Somos Dragon Devs desarrolladores de la aplicación AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación de esta aplicación usando estos conocimientos para el mejor desempeño de la aplicación, utilizando todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</h2>
        </div>
    </div>
    <div style="text-align: center; margin-top: 300px;">
        <p  id="pepe" style="font-size: 2.25rem; font-weight: 300; line-height: 1.2; color: #FFF">| FUNCIONES |</p>
        <div class="box-container2" style="margin-top: 100px; display: flex; flex-wrap: wrap; justify-content: center;">
            <div class="box2" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                <img src="\imagenes\taller2.jpg"  width="80" height="80"></img></p>
                <span style="font-size: 2.5rem; color: #1279C1">Talleres Mecanicos</span>
                <p style="color: #000">Descripción general sobre nosotros Somos Dragon Devs desarrolladores de la aplicación AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación de esta aplicación usando estos conocimientos para el mejor desempeño de la aplicación, utilizando todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</p>
            </div>
            <div class="box" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                <img src="\imagenes\motor.png"  width="80" height="80"></img></p>
                <span style="font-size: 2.5rem; color: #1279C1">Pilotos</span>
                <p style="color: #000">Descripción general sobre nosotros Somos Dragon Devs desarrolladores de la aplicación AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación de esta aplicación usando estos conocimientos para el mejor desempeño de la aplicación, utilizando todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</p>
            </div>
            <div class="box3" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                <img src="\imagenes\logomensaje.jpg"  width="80" height="80"></img></p>
                <span style="font-size: 2.5rem; color: #1279C1">Mensajeria</span>
                <p style="color: #000">Descripción general sobre nosotros Somos Dragon Devs desarrolladores de la aplicación AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación de esta aplicación usando estos conocimientos para el mejor desempeño de la aplicación, utilizando todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</p>
            </div>
            <div class="box3" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                <img src="\imagenes\logomensaje.jpg"  width="80" height="80"></img></p>
                <span style="font-size: 2.5rem; color: #1279C1">Mensajeria</span>
                <p style="color: #000">Descripción general sobre nosotros Somos Dragon Devs desarrolladores de la aplicación AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación de esta aplicación usando estos conocimientos para el mejor desempeño de la aplicación, utilizando todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</p>
            </div>
            
        </div>
    </div>
</body>
</html>
@endsection