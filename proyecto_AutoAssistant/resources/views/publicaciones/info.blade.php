@extends('sitioweb')
@section('content')
<style>
.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    z-index: var(--z-fixed);
    transition: .5s;
    color:#ffffff;
}
.header_toggle {
    color: #ffffff;
    font-size: 1.5rem;
    cursor: pointer
}
.header_img {
    width: 55px;
    height: 45px;
    display: flex;
    justify-content: center;
}
.header_img img {
    width: 40px;
}
.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed);
}
.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}
.nav_logo_5 {
    padding: 3px;
}
.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    padding: .5rem 0 .5rem 1.5rem;
}
.nav_logo {
    margin-bottom: 2rem;
}
.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color);
}
.nav_logo-name {
    color: var(--white-color);
    font-weight: 700;
}
.nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: .3s;
}
.nav_link:hover {
    color: var(--white-color);
}
.nav_icon {
    font-size: 1.25rem;
}
.show {
    left: 0;
}
.body-pd {
    padding-left: calc(var(--nav-width) + 1rem);
}
.active {
    color: var(--white-color);
}
.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color);
}
.height-100 {
    height: 100vh;
}
@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem);
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
    }

    .header_img {
        width: 40px;
        height: 40px;
    }

    .header_img img {
        width: 45px;
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0;
    }

    .show {
        width: calc(var(--nav-width) + 156px);
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px);
    }
}

.card_img {
    max-height: 300px;
    object-fit: cover;
}

.card_p {
    transition: 0.5s;
    cursor: default;
    background-color: #000000;
    color: #ffffff;
    max-width: 250px;
}

.card_title_p {
    font-size: 25px;
    transition: 1s;
    cursor: pointer;
    color: #ffffff;
}

.card_title_p i {
    font-size: 15px;
    transition: 1s;
    cursor: pointer;
    color: #ffa710;
}

.card_title_p i:hover {
    transform: scale(1.25) rotate(100deg);
    color: #18d4ca;
}

.card_p:hover {
    transform: scale(1.05);
    box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
}

.btn_card {
    background-color: #1279c1;
    color: #ffffff;
}

.card_b {
    background-color: #303134;
    color: #ffffff;
}

.select_b {
    background-color: #3b4043;
    color: #ffffff;
}

.select_b input::-moz-placeholder {
    color: rgb(255, 255, 255);
}

.select_b input::placeholder {
    color: rgb(255, 255, 255);
}

form input.select_b::-moz-placeholder {
    color: #ffffff;
}

form input.select_b::placeholder {
    color: #ffffff;
}

.btn_card_profile {
    background-color: #000000;
    color: #ffffff;
}

.card_show {
    background-color: #000000;
    color: #ffffff;
    font-size: x-large;
}
.background-image {
    background-image: url('/imagenes/fondo4.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Agrega esta línea */
    
}

</style>
<main class=" background-image">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="mb-3">
            <a href="{{ route('publicaciones.otravista') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <div class="card mb-3 card_show">
            <div class="card-header">
                Detalles del Piloto
            </div>
            <div class="card-body">
                <h2 class="card-title text-center">{{ $publicacion->titulo }}</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <img class="img-fluid card_img" src="{{ asset($publicacion->imagen) }}" alt="{{ $publicacion->titulo }}">
                    </div>
                </div>
                <p class="card-text"><strong>Descripción:</strong> {{ $publicacion->descripcion }}</p>
                <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                SOLUCION
                            </button>
                        </h2>
                        <div class="collapse" id="collapseExample">
                            <div style="color: black; background-color: #ffffff;" class="card card-body">{{ $publicacion->solucion }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</main>