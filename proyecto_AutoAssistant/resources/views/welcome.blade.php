<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>
    <br>
    <!--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h1 class="text-center">AUTOASSISTANT</h1>
                
                <h4>HAS INICIADO SESION<span class="badge bg-secondary">{{ Auth::user()->name }}</span></h4>
                </div>
            </div>
        </div>
    </div>-->

@role('admin')

    <div class="card text-bg-dark mb-3">
        <div class="card-header">
            <h1 class="text-center">AUTOASSISTANT</h1>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <h4>ERES UN ADMIN &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
            <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
            </blockquote>
        </div>
    </div>
@endrole

@role('conductor')
<style>
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
</style>

    <div class="card text-bg-dark mb-3">
        <div class="card-header">
            <h1 class="text-center">AUTOASSISTANT</h1>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <h4>ERES UN CONDUCTOR &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
            <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
            </blockquote>
        </div>
    </div>
@endrole

@role('futuro_conductor')
<style>
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
</style>
    <div class="card text-bg-dark mb-3">
        <div class="card-header">
            <h1 class="text-center">AUTOASSISTANT</h1>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <h4>ERES UN FUTURO CONDUCTOR &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
            <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
            </blockquote>
            </div>
            </div>
            
<div id="carouselConsejos" class="carousel slide" data-ride="carousel" data-interval="8000000" data-wrap="true">
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
                <p> <a style="color:white;">Cambie el aceite y el filtro según las recomendaciones del fabricante.</a></p>
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
        </div>
    </div>
@endrole

@role('taller_mecanico')
    <div class="card text-bg-dark mb-3">
        <div class="card-header">
            <h1 class="text-center">AUTOASSISTANT</h1>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <h4>ERES UN TALLER MECANICO &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
            <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
            </blockquote>
        </div>
    </div>
@endrole

@role('mecanico_independiente')
    <div class="card text-bg-dark mb-3">
        <div class="card-header">
            <h1 class="text-center">AUTOASSISTANT</h1>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <h4>ERES UN MECANICO INDEPENDIENTE &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
            <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
            </blockquote>
        </div>
    </div>
    @section('content')
  
@endrole

</x-app-layout>