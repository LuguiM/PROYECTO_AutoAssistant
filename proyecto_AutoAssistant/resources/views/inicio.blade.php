@extends('sitioweb')

@section('content')


<style>
    .container1{
    max-width: 800px;
    padding: 0px;
    text-align: center;
}
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
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 40px;
    justify-content: center;
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
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 600px;
    margin: 100 auto;
    padding: 0px;
    text-align: center;
}
/* Establecer el estilo del contenedor de imagen y texto */
.carousel-item {
    position: relative;
    border: 2px solid white;
    background-color:black;
}

.carousel-caption {
    background-color:black;
    color: #fff;
    position: static;
    padding: 5px;
   
    
}

.carousel-caption h3 {
    font-size: 0px;
    margin: 0;
}

.carousel-caption p {
    font-size: 16px;
    margin: 0;
    color:white;
}

/* Establecer el tamaño de las imágenes en el carrusel */
.carousel-inner img {
    max-width: 10cm;
    max-height: 5cm;
    width: 10;
    height: 6;
}      
.carouselConsejos {
    height: 300px; /* Cambia la altura según tus necesidades */
}
.card_p {
    max-width: 300px;
    margin: 0 auto; /* Corrige esta línea para centrar horizontalmente */
    filter: brightness(50%);
    transition: filter 0.3s;
    border-radius: 10px;
    background-color: black;
}

    .card_img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px; /* Ajusta el radio de las esquinas */
    }

    .card_title_p {
        font-size: 16px;
        margin-bottom: 5px;
        color: white;
        
    }     
    </style>
</head>


</a>
<div id="carouselConsejos" class="carousel slide" data-ride="carousel" data-interval="200000" data-wrap="true">
<body>
    <div class="container">
        <h1></h1>
        <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <p> <a style="color:white;">Revise el nivel de aceite regularmente.</a></p>
                    <img src="\imagenes\1 revise el nivel de aceite.jpg" alt="Consejo 1">
                    <p> <a style="color:white;"> Verificar el nivel de aceite en el motor de su vehículo es esencial para mantener su funcionamiento adecuado y prevenir daños</p>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="container">
        
        <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Cambie el aceite y el filtro según las recomendaciones del fabricante</a></p>
                    <img src="\imagenes\2 cambio de aceite.jpg" alt="Consejo 2">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Cambiar el aceite del motor y el filtro en los intervalos recomendados ayuda a mantener el motor limpio y funcionando correctamente.</a></p>
                    </div>
                </div>

                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Inspecciona los frenos cada 10.000 km. </a></p>
                    <img src="\imagenes\3 inspeccion de frenos.jpg" alt="Consejo 3">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;"> La inspección regular de los frenos garantiza que funcionen correctamente, lo que es fundamental para la seguridad.</a></p>
                    </div>
                </div>

                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Controle la presión de los neumáticos al menos una vez al mes. </a></p>
                    <img src="\imagenes\4 controle la presion de los neumaticos.jpg" alt="Consejo 4">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;"> Mantener la presión adecuada en los neumáticos mejora el rendimiento y la economía de combustible, así como la seguridad en la carretera.</a></p>
                    </div>
                </div>
       
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Verifique la alineación y balanceo de los neumáticos.  </a></p>
                    <img src="\imagenes\5 verifique la alineacion y balanceado de los neumaticos.jpg" alt="Consejo 5">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;"> Una alineación y balanceo adecuados ayudan a evitar el desgaste irregular de los neumáticos y mantener la estabilidad del vehículo.</a></p>
                    </div>
                </div>

                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Limpie y ajuste los frenos de tambor si es necesario.</a></p>
                    <img src="\imagenes\6 regule frenos de tambor.jpg" alt="Consejo 6">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Si su vehículo tiene frenos de tambor, debe limpiarlos y ajustarlos según sea necesario para mantener un frenado eficaz.</a></p>
                    </div>
                </div>

                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Reemplace las bujías de encendido a intervalos regulares.  </a></p>
                    <img src="\imagenes\7 cambio de bujias.jpg" alt="Consejo 7">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Reemplace las bujías de encendido a intervalos regulares: Las bujías son componentes cruciales para encender el combustible en el motor. Cambiarlas periódicamente ayuda a mantener un funcionamiento óptimo del motor.</a></p>
                    </div>
                </div>

                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">inspeccione y cambie los filtros de aire según lo recomendado.</a></p>
                    <img src="\imagenes\8 inspeccione y cambie filtro de aire.jpg" alt="Consejo 8">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">inspeccione y cambie los filtros de aire según lo recomendado: Los filtros de aire evitan que las partículas sucias entren en el motor. Deben ser revisados y reemplazados regularmente para mantener un flujo de aire limpio.</a></p>
                    </div>
                </div>
                
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Revise los niveles de líquido de frenos y líquido refrigerante.  </a></p>
                    <img src="\imagenes\9 inspeccion de liquido de frenos y refrigerante.jpg" alt="Consejo 9">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;"> Los niveles adecuados de estos líquidos son esenciales para el funcionamiento seguro del vehículo. Deben ser verificados y rellenos según sea necesario.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Inspecciona las correas y mangueras en busca de desgaste.</a></p>
                    <img src="\imagenes\10 inspeccion de correas y mangueras en busca de desgaste.jpg" alt="Consejo 10">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Las correas y mangueras son componentes críticos en el motor. La inspección regular ayuda a detectar desgaste y evitar posibles problemas.</a></p>
                        </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Lubrica las puertas y bisagras de tu vehículo.</a></p>
                    <img src="\imagenes\11 lubricacion de puertas y visagras.jpg" alt="Consejo 11">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;"> La lubricación ayuda a mantener las puertas y bisagras en buen estado y evita chirridos o dificultades al abrir y cerrarlas.</a></p>
                    </div>


                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Comprueba el sistema de luces y cambia bombillas fundidas.</a></p>
                    <img src="\imagenes\12 comprueba el sistema de luces.jpg" alt="Consejo 12">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Las luces son esenciales para la seguridad. Asegurarse de que todas funcionen correctamente es vital y si se encuentra una en mal estado cambiarla.</a></p>
                    </div>


                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Realiza una revisión de suspensión cada 20.000 km.</a></p>
                    <img src="\imagenes\13 revision de suspension.jpg" alt="Consejo 13">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Realiza una revisión de suspensión cada 20.000 km. La suspensión afecta la comodidad de conducción y la estabilidad. Una revisión periódica ayuda a mantener un manejo suave.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Inspecciona el sistema de escape en busca de fugas o daños.</a></p>
                    <img src="\imagenes\14 revison de fuga de escape.jpg" alt="Consejo 14">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Inspecciona el sistema de escape en busca de fugas o daños. Un sistema de escape en mal estado puede afectar el rendimiento y la emisión de gases. Debe ser revisado para no tener  problemas.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Verifique el funcionamiento de la batería y los terminales.</a></p>
                    <img src="\imagenes\15 revision de bateria.jpg" alt="Consejo 15">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Verifique el funcionamiento de la batería y los terminales. Una batería en buen estado es esencial para arrancar el vehículo. Verifique su carga y los terminales para evitar problemas de arranque.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Revise los amortiguadores y reemplázalos según las recomendaciones.</a></p>
                    <img src="\imagenes\16 revision de amortiguadores y cambio.jpg" alt="Consejo 16">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Revise los amortiguadores y reemplázalos según las recomendaciones. Los amortiguadores afectan la comodidad de conducción y la estabilidad. Reemplazarlos a tiempo mejora la seguridad.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">limpia y engrasa las partes móviles del chasis. </a></p>
                    <img src="\imagenes\17 engrase de chasis.jpg" alt="Consejo 17">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Limpia y engrasa las partes móviles del chasis. Esto ayuda a prevenir la corrosión y el desgaste de las partes móviles del vehículo.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Comprueba el sistema de dirección y alineación. </a></p>
                    <img src="\imagenes\18 revision de direccionales.jpg" alt="Consejo 18">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">nspecciona el sistema de refrigeración en busca de fugas. </a></p>
                    <img src="\imagenes\19 revision refrigeracopn de fugas.jpg" alt="Consejo 19">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Comprueba el sistema de dirección y alineación. Un sistema de dirección adecuadamente alineado contribuye a una conducción segura y evita un desgaste irregular de los neumáticos.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Limpie regularmente el filtro del aire acondicionado.</a></p>
                    <img src="\imagenes\20 cambio de filtro de aire acondicionado.jpg" alt="Consejo 20">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Limpie regularmente el filtro del aire acondicionado. Esto asegura un aire fresco y limpio en el interior del vehículo.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Verifique el estado del limpiaparabrisas y reemplázalos si están desgastados. </a></p>
                    <img src="\imagenes\21 cambio de limpia parabrisas.jpg" alt="Consejo 21">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Verifique el estado del limpiaparabrisas y reemplázalos si están desgastados. Los limpiaparabrisas en buen estado son esenciales para una visibilidad adecuada en condiciones climáticas adversas.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Inspecciona y ajusta el sistema de frenos antibloqueo (ABS) si es necesario. </a></p>
                    <img src="\imagenes\22 inspeccion de frenos abs.jpg" alt="Consejo 22">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Inspecciona y ajusta el sistema de frenos antibloqueo (ABS) si es necesario. El ABS es fundamental para la seguridad en frenos. Debe mantenerse en buen estado.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Cada 60 mil km cambiar llantas si es necesario</a></p>
                    <img src="\imagenes\23 cambiar llantas.jpg" alt="Consejo 23">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">cada 60 mil km cambiar llantas si es necesario: Las llantas desgastadas pueden afectar la tracción y la seguridad. Deben ser reemplazadas cuando sea necesario.</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Inspeccione el sistema de transmisión y cambie el líquido según las recomendaciones. </a></p>
                    <img src="\imagenes\24 revision de trasmision.jpg" alt="Consejo 24">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Inspeccione el sistema de transmisión y cambie el líquido según las recomendaciones. Un sistema de transmisión en buen estado es vital para una larga duración en tu trasmisión .</a></p>
                    </div>

                </div>
                <div class="container">
                <div id="carouselConsejos" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                <p> <a style="color:white;">Realiza una revisión general del motor y la transmisión cada 50.000 km.</a></p>
                    <img src="\imagenes\25 revision general de motor y caja.jpg" alt="Consejo 25">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p> <a style="color:white;">Realiza una revisión general del motor y la transmisión cada 50.000 km. Esto permite una evaluación exhaustiva de componentes clave del vehículo para prevenir problemas graves</a></p>
                 </div>
             </div>
        </div> 
     </div>
 </div>      
                <!-- Agrega más consejos aquí -->
     <div class="container1">
<body  style="background: url('/imagenes/fondo4.jpg') no-repeat center center fixed; background-size: cover;">
    <div style="text-align: center;">
        <div style="display: inline-block;">
            <div style="font-size: 45px; color: #fff; width: 350px; height: 250px; padding: 10px; margin-top: 450px;">
                <p><a style="color: #fff; text-decoration: none;">¿Necesitas ayuda con tu vehículo?</a></p>
                <img src="/imagenes/Logo.png" width="350" height="350" alt="Logo de la empresa" class="logo"
                    style="margin: 0px; margin-top: 0px;margin-right: 0px;">
            </div>
        </div>
        <div class="container1">
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
        <div class="container1">
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