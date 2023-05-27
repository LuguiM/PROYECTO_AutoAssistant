<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('build/assets/ani.css') }}">


<style>
  @charset "utf-8";
/* CSS Document */

@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

/*********************************
2. Body and some general stuff
*********************************/

body {
    background-color: #eee
    padding-bottom: 200px;
    height: 3000px;
    

}

.dropdown-menu .dropdown-item {
        color: black;
    }
.header-main {
    position: relative;
    padding-top: 7px;
    padding-bottom: 7px;
    background-color: #32525C
}

.logo {
    color: #fff;
    font-size: 25px;
    font-weight: 600
}

.brand-wrap {
    text-decoration: none !important
}

.icon-sm {
    width: 48px;
    height: 48px;
    line-height: 48px !important;
    font-size: 20px
}

.widget-header {
    display: inline-block;
    vertical-align: middle;
    position: relative
}

.widget-header .notify {
    position: absolute;
    top: -3px;
    right: -10px
}
.navbar-nav .nav-link {
  color: #000000; 
}
.notify {
    position: absolute;
    top: -4px;
    right: -10px;
    display: inline-block;
    padding: .25em .6em;
    font-size: 12px;
    line-height: 1;
    text-align: center;
    border-radius: 3rem;
    color: #fff;
    background-color: #fa3434
}
span.register {
    color: black;
}

span.login {
    color: black;
}
ul.hassubs a {
    color: black;
}
.mr-3,
.mx-3 {
    margin-right: 1rem !important
}

.search-form {
    border: 1px solid #ffffff !important
}

.search-button {
    color: #007bff;
    background-color: #ffffff;
    border-color: #ffffff
}

.navbar-main {
    background-color: #D9D9D9
}

.navbar-toggler {
    color: rgba(0, 0, 0, 0.5);
    color: rgba(0, 0, 0, 0.5);
    border-color: rgba(0, 0, 0, 0.1) !important
}

.navbar-toggler {
    padding: 4px;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 0.37rem
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .5rem 7px 0px;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: .45rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0
}

.navbar-toggler-icon {
    background-image: url(https://img.icons8.com/ios/50/000000/menu.png)
}

.nav-link {
    text-transform: uppercase;
    font-weight: 400
    
}

.vl {
    border-left: 1px solid #fff;
    height: 100%
}

.fas {
    color: #fff
}

.login {
    color: white
}

.option-box {
    padding: 0.1px;
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 1px;
}
.logo {
    color: #fff;
    font-size: 25px;
    font-weight: 600;
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px;
}
.small {
    font-size: 14px; 
    padding: 4px 8px; 
}
footer {
  background-color: #32525C;
  color: #fff;
  padding: 20px;
  text-align: center;
  margin-top: 600px;
}

footer p {
  margin: 0;
}
.footer-logo {
  width: 120px; /* Ajusta el ancho del logo según tus necesidades */
  height: 120px; /* Ajusta la altura del logo según tus necesidades */
  margin-right: 0px;
}

.logo-text {
  font-size: 40px; /* Cambia el tamaño del texto del logo según tus necesidades */
  color: #fff;
  margin-left: 0px; /* Espacio entre el logo y el texto */
}

.logo-container {
  display: flex;
  align-items: center;
}
.mail-option {
      color: #D9D9D9; /* Cambia el color aquí */
}
.footer-content {
background-color: #32525C; /* Cambia el color aquí */
}
.footer-contente {
    display: flex;
  align-items: center;
}

  </style>
  </head>
  <body>
 
  <header class="section-header">
    <section class="header-main border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4 col-md-4 col-5"> <a href="{{ ('inicio') }}" class="brand-wrap" data-abc="true">
                     <img src="\imagenes\Logo.png" atl="logo"  width="80" height="80" class="top_bar_icon"><span class="logo">AutoAssistant</span></img></a> </div>
                    
                <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                    
                </div>
                <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                    <div class="d-flex justify-content-end"> <a target="_blank" href="#" data-abc="true" class="nav-link widget-header"></i></a> <span class="vl"></span>
                        <div></i></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    </div>
                                </li>
                            </ul>
							<div class="d-flex justify-content-end">
                            <div class="option-box mr-2">
                            <a class="nav-link nav-user-img small" href="{{ route('login') }}"><span class="register">Iniciar Sesión</span></a>
                        </div>
                        <span class="vl"></span>
                        <div class="option-box">
                            <a class="nav-link nav-user-img small" href="{{ route('register') }}"><span class="login">Registro</span></a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-md navbar-main border-bottom">
        
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse collapse" id="dropdown6" style="">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ ('inicio') }}">Inicio<i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros<i class='bx bx-group'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ofrece">Servicios que ofrece<i class='bx bx-loader'></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="functionsDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="functionsDropdown">
                            <a class="dropdown-item" href="inicio">Pilotos</a>
                            <a class="dropdown-item" href="#">Talleres mecánicos</a>
                            <a class="dropdown-item" href="#">Contratar servicios</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

	
	<main >
		
		@yield('content')
	</main>
    
    


<footer>
<div class="container">
    <div class="footer-content">
      <div class="footer-content">
        <span class="logo-text">AutoAssistant</span>
        <img src="/imagenes/Logo.png" alt="Logo" class="footer-logo">
      </div>
      <p ></p>
      <div class="row mb-4">
        <div class="col-md-6">
        <p class="text-left">CONTACTOS</p>
        </div>
        <div class="col-md-6">
          <p class="text-left">OPCIONES DE INGRESO</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-6">
          <p class="text-left mail-option">AutoAssitant@gmail.com</p>
        </div>
        <div class="col-md-6">
          <p class="text-left mail-option">Taller Mecanico</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-6">
          <p class="text-left">Sevicio al Cliente</p>
        </div>
        <div class="col-md-6">
          <p class="text-left mail-option">Mecanico Independiente</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-6">
          <p class="text-left mail-option">7890-6798</p>
        </div>
        <div class="col-md-6">
          <p class="text-left mail-option">Conductor y Futuro conductor</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-content">
      <!-- Contenido del pie de página -->
      <p class="text-center">&copy; 2023 AutoAssistant by DragonDevs. Todos los derechos reservados. <a href="lol">Términos y condiciones</a></p>
    </div>
  </div>
  </div>
</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                var target = $(this).data('target');
                $(target).toggleClass('show');
            });
        });
                $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
       
       
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                var target = $(this).data('target');
                $(target).toggleClass('show');
            });

            $('#pepe').on('click', function(e) {
                var target = $(this).attr('href');
                if (target === '#') {
                    e.preventDefault();
                    $(this).on('dblclick', function(e) {
                        e.preventDefault();
                        // Aquí puedes poner la función que se ejecutará en el doble clic
                        console.log('id="functionsDropdown"');
                    });
                }
            });
        });
    </script>
</body>

</html>