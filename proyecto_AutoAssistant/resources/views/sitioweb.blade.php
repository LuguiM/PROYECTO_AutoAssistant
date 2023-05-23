<!doctype html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


<Style>
  @charset "utf-8";
/* CSS Document */

@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

/*********************************
2. Body and some general stuff
*********************************/

body {
    background-color: #eee
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
  </Style>
  </head>
  <body>
  <header class="section-header">
    <section class="header-main border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4 col-md-4 col-5"> <a href="{{ ('inicio') }}" class="brand-wrap" data-abc="true">
                     <img src="\imagenes\Logo.png" atl="logo"  width="100" height="70" class="top_bar_icon" ></img> </a> </div>
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
							<a class="nav-link nav-user-img" href="{{ route('login') }}" data-toggle="modal" data-target="#login-modal" data-abc="true"><span class="register">Iniciar Seccion</span></a>
						<span class="vl"></span>
						<a class="nav-link nav-user-img" href="{{ route('register') }}" data-toggle="modal" data-target="#login-modal" data-abc="true"><span class="login">Registro</span></a>
			     	</div>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-md navbar-main border-bottom">
        <div class="container-fluid">
            <form class="d-md-none my-2">
                <div class="input-group"> <input type="search" name="search" class="form-control" placeholder="Search" required="">
                    <div class="input-group-append"> <button type="submit" class="btn btn-secondary"> <i class="fa fa-search"></i> </button> </div>
                </div>
            </form> <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
            <div class="navbar-collapse collapse" id="dropdown6" style="">
                <ul class="navbar-nav mr-auto">
                    <ul class="hassubs"><a href="{{ ('inicio') }}">Inicio<i class='bx bx-home-alt'></i></a></ul>
					<ul class="hassubs"><a href="{{ ('nosotros') }}">Nosotros<i class='bx bx-group'></i></a></ul>
					<ul class="hassubs"><a href="{{ ('contactos') }}">Contactos<i class='bx bxs-contact'></i></a></ul>
					<ul class="hassubs"><a href="{{ ('opciones') }}">Opciones<i class='bx bxs-widget'></i></a></ul>
                    <ul class="hassubs"><a href="{{ ('funciones') }}">Funciones<i class='bx bx-layer'></i></a></ul>
									
								</ul>
							</div>
                </ul>
            </div>
        </div>
    </nav>
</header>

	</header>
	
	<div style="height: 700px">
		
		@yield('content')
	</div>

</div>
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </body>
</html>