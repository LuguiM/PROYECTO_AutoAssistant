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

        <!-- Scripts -->
        @vite(['resources/css/app.css'])
        
    </head>
    <body id="body-pd">
    @if (isset($header))
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> 
        
        </div>
        
        
        {{ $header }} 
        @if (Route::has('login'))
            {{ Auth::user()->name }}
        @endif
        
    </header>
    @endif
    <div class="l-navbar" id="nav-bar">
    
        <nav class="nav">
            <div> 
            
                <a href="{{url('/welcome')}}" class="nav_logo"> <img src="\imagenes\Logo.png" atl="logo" width="30" height="40"></img> <span class="nav_logo-name">AutoAssistant</span> </a>
                @if (Route::has('login'))
                <div class="nav_list"> 
                
                @auth
                    <a href="{{url('/welcome')}}" class="nav_link active"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">INICIO</span> </a> 
                    <a href="{{route('profile.edit')}}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">PERFIL</span> </a> 
                    <a href="{{ route('publicaciones.index') }}" class="nav_link"> 
                    <i class='bx bx-car nav_icon'></i>
                        <span class="nav_name">{{ __('PILOTOS/ICONOS') }}</span> </a>
                    
                   <!-- <a href="{{ route('publicaciones.create') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Crear Icono</span> </a> -->
                    @if (Route::has('register'))
                    
                    @endif
                    @endauth
                </div>
                @endif
            </div> 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                 class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">{{ __('CERRAR SESION') }}</span> </a>
                </form>
                
        </nav>
        
    </div>
     <!-- Page Content -->
    <main>
            {{ $slot }}
    </main>

</body>
@vite([ 'resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
   
</html>
