<template>
  <div>
    <div class="overlay" v-if="isOpen" @click="close"></div>
    <div class="floating-form" v-if="isOpen">
      <!-- Contenido del formulario -->
      <div class="form-header">
        <div class="form-title">Contratación de Servicio</div>
        <div class="form-buttons">
          <button class="form-button btn btn-danger" @click="close">&times;</button>
        </div>
      </div>
      <form class="form-content" v-if="servicioMecanico" @submit.prevent="contratarServicio">
      <!-- Campos del formulario -->
      <div class="form-floating col-12 form-group">
        <input type="text" class="text-bg-dark form-control" id="conductor" v-model="servicio.conductor" disabled>
        <label for="conductor" class="text-white">Nombre del Conductor</label>
      </div>
      <div class="form-floating col-12 form-group">
        <input type="text" class="form-control" id="servicios" v-model="servicio.servicios" disabled >
        <label for="servicios">Servicio a Contratar</label>
      </div>
      <div class="form-floating col-12 form-group">
        <input type="datetime-local" class="form-control" id="fecha" v-model="servicio.fecha" placeholder="Fecha y Hora" required>
        <label for="fecha">Fecha y Hora</label>
      </div>
      <div class="form-floating col-12 form-group">
        <select id="tipoServicio" v-model="servicio.tipoServicio" class="form-select" required>
          <option disabled value="">Tipo Servicio...</option>
          <option value="Adomicilio">Adomicilio</option>
          <option value="Cita/Reserva">Cita en taller</option>
        </select>
        <label for="tipoServicio">Selecciona un Tipo de Servicio</label>
      </div>
      <div class="form-group">
        <!-- Botón para contratar el servicio -->
        <button type="submit" class="btn btn-primary">Contratar</button>
      </div>
    </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import alertify from 'alertifyjs';

export default {
   props: {
    servicioMecanico: {
      type: Object,
      required: true
    },
    datosFormulario: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      servicioId: null,
      accion: 'nuevo',
      servicio: {
        conductor: '',
        servicios: '',
        fecha: '',
        tipoServicio: ''
      },
      isOpen: false
    };
  },
  mounted() {
   this.obtenerDatosFormulario();
   console.log(this.servicio.conductor);
   console.log(this.contratarServicio())
},
  
  methods: {
    
    open() {
      this.isOpen = true;
    },
    close() {
      this.isOpen = false;
    },
    modificarServicio(servicio){
      this.accion = 'modificar';
      this.servicio = servicio;
    },
    contratarServicio() {
      if(this.servicio.fecha == '' || this.servicio.tipoServicio == ''){
        console.log('Por favor ingrese los datos correspondiente');
        return;
      }

      this.servicio.servicio_id = this.servicioMecanico.id;  // Agrega servicio_id al objeto this.servicio
      this.servicio.mecanico_id = this.servicioMecanico.id_user;  // Agrega mecanico_id al objeto this.servicio

      let method = 'PUT'; //Actualizar
      if(this.accion === 'nuevo'){
        method= 'POST';//Insertar
      }
      axios({
        url: '/servicios-mecanicos/' + this.servicioMecanico.id + '/contrataciones',
        method,
        data: this.servicio
      }).then(resp=>{
        if(resp.data.msg!='ok'){
            alertify.error('Error al intentar sincronizar registro con el servidor: '+resp.data.msg)
        }else{
            alertify.success('Registro almacenado exitosamente');
            // Esperar 3 segundos antes de redireccionar
            setTimeout(function() {
                window.location.href = '/contrataciones';
            }, 3000); // 3000 milisegundos = 3 segundos
        }
        console.log(resp);
      }).catch(err=>{
        console.error(err);
      })
    },
    obtenerDatosFormulario() {
      this.servicio.conductor = this.datosFormulario.conductor;
      this.servicio.servicios = this.datosFormulario.servicios;
     
    }
  
  }
  
};
</script>
