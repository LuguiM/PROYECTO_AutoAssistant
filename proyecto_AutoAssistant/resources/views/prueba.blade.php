<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


        <title>{{ config('app.name', 'AutoAssistant') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <!-- Scripts -->
       
        <style>
   nav {
  display: flex;
  flex-direction: column;
  background-color: #f2f2f2;
  height: 100%;
  width: 200px;
  position: fixed;
  top: 0;
  left: -200px;
  transition: left 0.3s ease-in-out;
}

nav.active {
  left: 0;
}

.logo {
  margin: 20px 0 50px 0;
  text-align: center;
}

.logo img {
  max-width: 100%;
  height: auto;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  height: 100%;
}

li {
  margin-top: 20px;
}

a {
  display: flex;
  align-items: center;
  color: #333;
  text-decoration: none;
  font-size: 16px;
}

i {
  font-size: 24px;
  margin-right: 10px;
}

a:hover {
  color: #007bff;
}

@media screen and (max-width: 768px) {
  nav {
    width: 100%;
    height: 50px;
    top: -50px;
    left: 0;
    flex-direction: row;
    align-items: center;
  }
  nav.active {
    top: 0;
  }
  .logo {
    margin: 0 20px;
    margin-bottom: 0;
    text-align: left;
  }
  ul {
    flex-direction: row;
    justify-content: flex-start;
    height: 100%;
  }
  li {
    margin-top: 0;
    margin-left: 20px;
  }
  ul a {
    font-size: 18px;
  }
  ul i {
    font-size: 30px;
  }
}

header {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  width: 100%;
  position: fixed;
  top: 0;
  background-color: red;
  color: #fff;
}

#current-page {
  font-weight: bold;
  font-size: 18px;
}


        </style>
    </head>
    <body >
    <header style="background-color: red;">
  <div id="current-page"></div>
</header>
<nav class="active">
  <div class="logo">
    <a href="#"><img src="logo.png" alt="Logo"></a>
  </div>
  <ul>
    <li><a href="#" class="active"><i class="fas fa-home"></i> Inicio</a></li>
    <li><a href="#"><i class="fas fa-user"></i> Perfil</a></li>
    <li><a href="#"><i class="fas fa-envelope"></i> Mensajes</a></li>
    <li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
  </ul>
  <div class="toggle">
    <i class="fas fa-bars"></i>
  </div>
</nav>




     <!-- Page Content -->
    <main>
           
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    

</html>
