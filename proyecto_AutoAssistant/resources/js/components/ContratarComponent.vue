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
      <form class="form-content" v-if="servicioMecanico">
      <!-- Campos del formulario -->
      <div class="form-floating col-12 form-group">
        <input type="text" class="text-bg-dark form-control" id="conductor" v-model="servicio.conductor" disabled>
        <label for="conductor" class="text-white">Nombre del Conductor</label>
      </div>
      <div class="form-floating col-12 form-group">
        <input type="text" class="form-control" id="servicios" v-model="servicioMecanico.servicios" disabled >
        <label for="servicios">Servicio a Contratar</label>
      </div>
      <div class="form-floating col-12 form-group">
        <input type="datetime-local" class="form-control" id="fecha" v-model="servicioMecanico.fecha" placeholder="Fecha y Hora">
        <label for="fecha">Fecha y Hora</label>
      </div>
      <div class="form-floating col-12 form-group">
        <select id="tipoServicio" v-model="servicioMecanico.tipoServicio" class="form-select">
          <option disabled value="">Tipo Servicio...</option>
          <option value="Adomicilio">Adomicilio</option>
          <option value="Cita/Reserva">Cita/Reserva</option>
        </select>
        <label for="tipoServicio">Selecciona un Tipo de Servicio</label>
      </div>
      <div class="form-group">
        <!-- Botón para contratar el servicio -->
        <button type="submit" class="btn btn-primary" @click.prevent="contratarServicio">Contratar</button>
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
   console.log(this.servicio.conductor)
},
  
  methods: {
    open() {
      this.isOpen = true;
    },
    close() {
      this.isOpen = false;
    },
    contratarServicio() {
      // Lógica para enviar el formulario
    },
    obtenerDatosFormulario() {
      this.servicio.conductor = this.datosFormulario.conductor;
      this.servicio.servicios = this.datosFormulario.servicios;
     
    }
  
  }
  
};
</script>
