@extends('sitioweb')

@section('content')
<style>
    .container{
    max-width: 800px;
    padding: 20px;
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
        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centra horizontalmente en la página */
            justify-content: flex-start; /* Coloca el cuadro gris en la parte superior */
            height: 100vh; /* 100% de altura de la ventana */
            margin-bottom: 200px;
        }

        /* Estilos para el cuadro grande */
        .cuadro-grande {
            width: 900px;
            height: 300px;
            background-color: #00BFFF; /* Color celeste */
            color: #fff; /* Color del texto blanco */
            text-align: center; /* Centra el texto horizontalmente */
            line-height: 100px; /* Centra el texto verticalmente */
            font-size:24px ;
        }

        /* Estilos para el cuadro pequeño (gris) */
        .cuadro-pequeno {
            width: 900px;
            height: 60px;
            background-color: gray; /* Color gris */
            color: #fff; /* Color del texto blanco */
            text-align: center; /* Centra el texto horizontalmente */
            line-height: 40px; /* Centra el texto verticalmente */
        }
    </style>
</head>
<body>
    <div class="container">
       <div style="font-size: 45px; color: #fff";><p>Asesoria con expertos</p>
        <div class="cuadro-pequeno">
            <p>Asesoria Mécanica</p>
        </div>
        <div style="font-size: 24px;">
        <div class="cuadro-grande">
            <p>Contactar a expertos como talleres mecanicos o mecanicos independientes para solicitar una ayuda ami problematica</p>
        </div>
    </div>
    </div>
</body>

<body style="background: url('/imagenes/fondo4.jpg') no-repeat center center fixed; background-size: cover;">
    

@endsection