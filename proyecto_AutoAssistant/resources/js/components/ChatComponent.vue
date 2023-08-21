<template>
  <div>
    <div class="overlay" v-if="isOpen" @click="close"></div>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card floating-form" :class="{ open: isOpen }" id="lstMensaje">
            <div class="card-header d-flex justify-content-between align-items-center p-3" style="border-top: 4px solid blue;">
              <h5 class="mb-0">Chat messages</h5>
              <div class="d-flex flex-row align-items-center">
                <span class="badge bg-primary me-3">{{ chats.length }}</span>
               <button class="btn btn-danger" @click="close">&times;</button>
              </div>
            </div>
            <div class="card-body text-bg-light" style="position: relative; height: 400px; overflow-y: auto;">
              <div v-for="msg in chats" :key="msg._id" class="">
                <div class="d-flex justify-content-between">
                  <p class="small mb-1 ">{{ msg.to }}</p>
                  <p class="small mb-1 text-muted">{{ msg.fecha }}</p>
                </div>
                <div class="d-flex flex-row justify-content-start">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-3 rounded-3 text-bg-dark" >
                      {{ msg.message }}
                    </p>
                  </div>
                </div>
                <div  class="d-flex justify-content-between">
                  <p class="small mb-1 text-muted">{{ msg.fecha }}</p>
                  <p class="small mb-1">{{ msg.from }}</p>
                </div>
                <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                  <div>
                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary">
                      {{ msg.message }}
                    </p>
                  </div>
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                </div>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-start align-items-center">
                <form id="frmChat" @submit.prevent="guardarChat" @reset.prevent="nuevoChat()" class="d-flex flex-row">
                    <div class="flex-grow-1">
                    <input type="text" class="form-control" required v-model="chat.message" placeholder="Escribe tu mensaje" />
                    </div>
                    <div class="ms-3">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import alertify from 'alertifyjs';
import axios from 'axios';

export default {
   
  data() {
    return {
      chats: [],
      chat: {
        from: 'usuario',
        to: 'todos', //Ajusta el destinatario segun las necesidades
        message: '',
        status: '',
        fecha: new Date(),
        room: '', //variable para almacenar la sala actual
      },
      isOpen: false,
    };
  },
  methods: {
    open() {
      this.isOpen = true;
      this.chat.room = this.getRoomName(); //se obtiene el nombre de la sala 
      socketio.emit('joinRoom', this.chat.room);
    },
    close() {
      this.isOpen = false;
    },
    guardarChat() {
      if (this.chat.message !== '') {
        this.chats.push({ ...this.chat });
        socketio.emit('chat', this.chat);
        this.chat.message = '';
      } else {
        alertify.error('Por favor escriba un mensaje');
      }
    },
    obtenerHistorial() {
        axios.get('/contrataciones').then(response =>{
            const contratacionesObj = response.data;
            
            // Convierte el objeto JSON en un array
            const contrataciones = Object.values(contratacionesObj);
            const conductorId = 1;
            const mecanicoId = 2;

            const contratacion = contrataciones.find(item =>{
                return item.conductor_id === conductorId && item.mecanico_id ===mecanicoId;
            });
        }).catch(error =>{
            console.error(error);
        })
        socketio.emit('historial');
        socketio.on('historial', (chats) => {
        this.chats = chats;
      });
    },
    getRoomName() {
      // Lógica para obtener el nombre de la sala según los usuarios involucrados
      // Puedes utilizar los IDs de conductor y mecánico para generar un nombre único
      return `room_${this.chat.from}_${this.chat.to}`;
    },
  },
  created() {
    this.obtenerHistorial();
    socketio.on('chat', (chat) => {
      this.chats.push(chat);
    });
  },
};
</script>

<style>
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.floating-form {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: gray;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  z-index: 10000;
  display: none; /* Ocultar el modal por defecto */
  width: 500px; 
}

.floating-form.open {
  display: block; /* Mostrar el modal cuando isOpen es true */
}
.card-footer {
  flex-wrap: wrap;
}

.card-footer form {
  flex-grow: 1;
  display: flex;
  align-items: center;
}

.card-footer input[type="text"] {
  flex-grow: 1;
}

.card-footer button[type="submit"] {
  margin-left: 10px;
}
</style>




