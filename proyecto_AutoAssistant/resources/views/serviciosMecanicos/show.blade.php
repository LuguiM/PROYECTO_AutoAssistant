<style>
 @import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

 .cardo{
  position: relative;
  text-align: center;
 }
 h5{
  color:black;
 }
 .title{
  position:absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 36px;
  color: black !important;
  text-shadow: 0 0 10px white;
  animation: glow 1s ease-in-out infinite alternate;
  text-transform: uppercase;
 }
 @keyframes  glow{
  0%{
    text-shadow: 0 0 10px white;
  }
  100%{
    text-shadow: 0 0 20px lightblue, 0 0 30px lightblue, 0 0 40px lightblue, 0 0 50px white, 0 0 60px white, 0 0 70px white, 0 0 80px white;
  }
 }
 .blurred-image{
  filter: blur(0px);
  max-width: 100%;
  height: auto;
  padding: 0 0 10px 12px;
 }
 @media (max-width: 768px){
  .blurred-image{
    padding-right: 20px;
  }
  .cardo{
    display: flex;
    justify-content: flex-end;
    text-align:right;
  }

 }
 .overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.floating-form {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #32525C;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
  z-index: 10000;
}
.form-content {
  width: 400px; /* Ancho del formulario */
  max-width: 100%;
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}
.form-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
}

.form-title {
  font-weight: bold;
  color: white;
}

.form-buttons {
  display: flex;
  align-items: center;
}

.form-button.close-button {
  margin-left: auto;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicio Mecanico') }}
        </h2>
    </x-slot>
    <br>

    <div class="container">
      <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-outline-secondary">REGRESAR</a>
    </div>
        
    <br>
    
    <div class="container">
      <div class="card text-bg-dark border-primary cardo">
        <div class="card-header">SERVICIO MECANICO</div>
          <img src="{{asset($servicioMecanico->logo)}}" class="blurred-image" alt="servicio" style="max-width: 400px; margin-top:10px;">
          <div class="card-img-overlay">
            <h4 class="card-title title">{{$servicioMecanico->servicios}}</h4>
          </div>
      </div>
    </div>

    <br>

    <div class="container px-4 text-center">
      <div class="card text-bg-dark border-primary mb-3">
        <div class="card-header bg-primary">DESCRIPCION DEL SERVICIO</div>
        <div class="card-body">
          <h5 class="card-title">{{$servicioMecanico->descripcion}}</h5>
        </div>
      </div>
    

      <div class="row gx-1">
        <div class="col">
          <div class="p-3">
            <div class="card text-bg-dark border-primary mb-3">
              <div class="card-header bg-primary">OFRECIDO POR</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->representante}}</h5>
              </div>

              <div class="card-header bg-primary">TIPO DE SERVICIO</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->tipoServicio}}</h5>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="p-3">
            <div class="card text-bg-dark border-primary mb-3">
              <div class="card-header bg-primary">DIRECCION</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->direccion}}</h5>
              </div>

              <div class="card-header bg-primary">RUBRO</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->rubro}}</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="p-3">
            <div class="card text-bg-dark border-primary mb-3">
              <div class="card-header bg-primary">HORARIO</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->horario}}</h5>
              </div>

              <div class="card-header bg-primary">CONTACTO</div>
              <div class="card-body">
                <h5 class="card-title">{{$servicioMecanico->numeroContacto}}</h5>
              </div>
            </div>
          </div>
        </div>

        
        <div id="App">
          <div class="d-grid gap-2">
            <a class="btn btn-outline-primary btn-lg" @click="openForm">CONTRATAR SERVICIO</a>
          </div>
          <div id="sistemApp">
            <contratar  ref="contratar"   :servicio-mecanico="{{ $servicioMecanico }}" :datos-formulario="{{ json_encode($datosFormulario) }}"></contratar>
          </div>
          
        </div>
        
      </div>
    </div>  
    <br>

</x-app-layout>