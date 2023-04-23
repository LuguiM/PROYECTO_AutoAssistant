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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <!-- Scripts -->
       
        <style>
  body{
    background-color: #eee;
    position: relative;
    
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s
  }
  .header {
    width: 100%;
    height: 50px;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: #3498db;
    z-index: var(--z-fixed);
    transition: .5s
}
.header_toggle {
  width: 70px;
    height: 80px;
    display: flex;
    justify-content: center;
   
    overflow: hidden;
    cursor: pointer;
}

.nav {
  padding:50px 50px 30px 0;;
    height: 100%;
    display: flex;
    flex-direction: column;
    
    overflow: hidden
}
    .nav-link{
      border-radius:0px !important;transition:all 0.5s;width:100px;display:flex;flex-direction:column}
      .nav-link small{font-size:12px}
      .nav-link:hover{background-color: #52525240 !important}
      .nav-link .fa{transition: all 1s;font-size:20px}
      .nav-link:hover .fa{transform: rotate(360deg)}

        </style>
    </head>
    <body >
    <header class="header" id="header">
    <div class="header_toggle"> <img src="imagenes\LogoAutoAssistant.png" atl="logo" ></img>
        
        </div>
        <span></span>
        
 
       
        <div class="header_img">
        
        </div>
        {{ Auth::user()->name }}
    </header>
</header>
<nav class="active">
<div class="d-flex flex-column flex-shrink-0 bg-light vh-100" style="width: 100px;">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item"> <a href="#" class="nav-link active py-3 border-bottom"> <i class="fa fa-home"></i> Home </a> </li>
        <li> <a href="#" class="nav-link py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Dashboard</small> </a> </li>
        <li> <a href="#" class="nav-link py-3 border-bottom"> <i class="fa fa-first-order"></i> <small>My Orders</small> </a> </li>
        <li> <a href="#" class="nav-link py-3 border-bottom"> <i class="fa fa-cog"></i> <small>Settings</small> </a> </li>
        <li> <a href="#" class="nav-link py-3 border-bottom"> <i class="fa fa-bookmark"></i> <small>Bookmark</small> </a> </li>
    </ul>
    <div class="dropdown border-top"> <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle"> </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
</nav>




     <!-- Page Content -->
    <main>
           
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    

</html>
