
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  padding-top: 56px;
  font-family: "Euclid Circular A";
  background: #3f2d96;
  color: #f9f9f9;
}


section {
  display: flex;
  background: #2b2a31;
  padding: 20px 0;
}

header {
  display: flex;
  align-items: center;
  height: 120px;
  margin: 0;
  padding: 0 20px;
  background: #3f2d96;
  font-weight: 400;
  color: #f9f9f9;
}

.filters {
  position: sticky;
  z-index: 1;
  top: 76px;
  width: 160px;
  height: 100%;
  padding: 0 20px;
}

.filters h2 {
  color: #7d7a7a;
  font-size: 14px;
  font-weight: 500;
  margin: 0 0 10px;
}

.filters label {
  display: flex;
  align-items: center;
  gap: 10px;
  height: 55px;
  font-size: 14px;
  color:white;
  
}

.filters input {
  margin: 0;
  accent-color: #6245e7;
}

.grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding-right: 20px;
  
}

.grid-item {
  flex: 0 0 calc(23.33% - 10px); /* Ajustar el tamaño de las tarjetas */
  min-width: 200px;
  min-height: 200px;
  margin-bottom: 20px; /* Agregar un margen inferior entre las tarjetas */
  background: #3d3c46;
  margin-right: 10px;
  background-color:lightblue;
  color:black;
}


.card {
  font-size: 16px;
  margin: 10px;
  background-color: red;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    max-width: 100%;
  max-height: 160px; 
  display: block;
  margin: 0 auto; 
  object-fit: contain; 
}

@media (max-width: 768px) {
  .grid {
    flex-wrap: wrap;
    overflow: hidden;
    height: auto;
  }

  .grid-item {
    flex-basis: 100%;
    margin-right: 0;
  }
}


</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Mecanicos') }}
        </h2>
    </x-slot>
    <br>
    
    <body>    
        <section>
            <aside class="filters">
                <h2>Rubros de talleres</h2>
                <label>
                <input type="checkbox" />
                Mecanico
                </label>
                <label>
                <input type="checkbox" />
                Electrico
                </label>
                <label>
                <input type="checkbox" />
                Enderezado y Pintura
                </label>
                <label>
                <input type="checkbox" />
                General de caja
                </label>
                <label>
                <input type="checkbox" />
                Lubricentro
                </label>
                <label>
                <input type="checkbox" />
                Llanterias
                </label>
            </aside>
            <div class="grid">
                <div class="grid-item">
                    <img src="\imagenes\Logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        2 days ago
                    </div>
                </div>
                <div class="grid-item">
                    <img src="\imagenes\Logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                    <div class="card-footer text-body-secondary">
                        2 days ago
                    </div>
                </div>
                <div class="grid-item">
                    <img src="\imagenes\Logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                    <div class="card-footer text-body-secondary">
                        2 days ago
                    </div>
                </div>
                <div class="grid-item">
                    <img src="\imagenes\Logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                    <div class="card-footer text-body-secondary">
                        2 days ago
                    </div>
                </div>
                
            </div>
        </section>
    </body>
</x-app-layout>
