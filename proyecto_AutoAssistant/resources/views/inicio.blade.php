@extends('sitioweb')

@section('content')


<style>
body {
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

.box2,
.box,
.box3 {
    background-color: #fff;
    margin: 10px;
    padding: 20px;
    flex: 1 1 300px;
    max-width: 300px;
    border-radius: 10px;
    border: 2px solid #000;
}
</style>

<body style="background: url('/imagenes/fondo4.jpg') no-repeat center center fixed; background-size: cover;">
    <div style="text-align: center;">
        <div style="display: inline-block;">
            <div style="font-size: 45px; color: #fff; width: 350px; height: 250px; padding: 10px; margin-top: 100px;">
                <p><a style="color: #fff; text-decoration: none;">¿Necesitas ayuda con tu vehículo?</a></p>
                <img src="/imagenes/Logo.png" width="350" height="350" alt="Logo de la empresa" class="logo"
                    style="margin: 0px; margin-top: 0px;margin-right: 0px;">
            </div>
        </div>
        <div class="container">
            <div class="box1" style="background-color: transparent;margin-top: 300px">
                <p style="text-align: center; font-size: 40px; font-weight: 300; line-height: 1.2; color: #FFF">|
                    Descripción de la aplicación Autoassistant |</p>
                <h2 style="font-size: 30px; color: #1279C1;">Autoassistant tu mecánico virtual, con las funciones que te
                    ayudaran a solucionar las problemáticas de tu vehículo, brindándote funciones en las que puedas
                    acceder a la información que brinda para los conductores y el registro o ingreso para talleres
                    mecánicos o mecánicos independientes para que puedan inscribirse y poder ofrecer servicios a los
                    conductores.</h2>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <img id="nosotros" src="/imagenes/logoequipo.png" width="330" height="200" alt="Logo de la empresa"
                style="margin-top: 200px; margin-bottom: 50px;margin-right: 30px">
        </div>
        <div class="container">
            <p style="text-align: center; font-size: 40px; font-weight: 300; line-height: 1.2; color: #FFF">| SOBRE
                NOSOTROS |</p>
            <div class="box1 animated fadeIn" style="margin-bottom: 200px; background-color:  transparent;">
                <h2 style="font-size: 30px; color: #1279C1;">Somos Dragón Devs desarrolladores de la aplicación
                    AutoAssistant, como equipo multifuncional con conocimientos en las diferentes áreas para la creación
                    de esta aplicación, usando estos conocimientos para el mejor desempeño de la aplicación, utilizando
                    todas nuestras destrezas y fortalezas para hacer su experiencia agradable.</h2>
            </div>
        </div>
        <div style="text-align: center; margin-top: 300px;">
            <p id="ofrece" style="font-size: 40px; font-weight: 300; line-height: 1.2; color: #FFF">| FUNCIONES |</p>
            <div class="box-container2"
                style="margin-top: 100px; display: flex; flex-wrap: wrap; justify-content: center;">
                <div class="box2" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                    <img src="\imagenes\tallermecanicos.png" width="80" height="80"></img></p>
                    <span style="font-size: 40px; color: #1279C1">Talleres Mecánicos</span>
                    <p style="color: #000">Descripción: En esta función los talleres mecánicos y mecánicos
                        independientes podrán observar los requisitos que necesitan al inscribir sus servicios.</p>
                </div>
                <div class="box" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                    <img src="\imagenes\pilotos1.png" width="80" height="80"></img></p>
                    <span style="font-size: 40px; color: #1279C1">Pilotos</span>
                    <p style="color: #000">Descripción: Esta función te ayudará a encontrar el piloto del que usted
                        necesite información y una posible solución.</p>
                </div>
                <div class="box3" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                    <img src="\imagenes\contratar.png" width="80" height="80"></img></p>
                    <span style="font-size: 40px; color: #1279C1">Contratar servicios </span>
                    <p style="color: #000">Descripción: En esta función los conductores y futuros conductores podrán
                        contratar el servicio que necesita.</p>
                </div>
                <div class="box3" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                    <img src="\imagenes\serviciosme.png" width="80" height="80"></img></p>
                    <span style="font-size: 40px; color: #1279C1">Servicios mecánicos </span>
                    <p style="color: #000">Descripción: Esta función le servirá al conductor a ver todos los servicios
                        mecánicos que la aplicación ofrece.</p>
                </div>
                <div class="box3" style="margin: 10px; flex: 1 1 300px; max-width: 300px;">
                    <img src="\imagenes\inscripcion1.png" width="80" height="80"></img></p>
                    <span style="font-size: 40px; color: #1279C1">Inscripción de servicios </span>
                    <p style="color: #000">Descripción: Esta función es para que los talleres mecánicos y los mecánicos
                        independientes puedan inscribir sus servicios dentro de la aplicación.</p>
                </div>
            </div>
        </div>
</body>

@endsection