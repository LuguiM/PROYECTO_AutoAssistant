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
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN FUTURO CONDUCTOR &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span>
                    </h4>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
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
                    <h4>ERES UN MECANICO INDEPENDIENTE &#128526;<span
                            class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
    @endrole

</x-app-layout>
