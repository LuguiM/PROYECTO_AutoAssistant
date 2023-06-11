import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });


import {createApp} from 'vue';
import contratar from './components/ContratarComponent.vue';
import chat from './components/ChatComponent.vue';
window.db = '';
window.socketio = io('http://127.0.0.1:3001');
socketio.on('connect', socket=>{
    console.log('conectado a nodejs en puerto 3001');
});

window.db = '';

const app = createApp({

    components:{
        contratar,
        chat,
    },
    data(){
        return{
            forms:{
                contratar:{mostrar:false},
                chat: {mostar:false}
            }
        }
    },  
    methods:{
        openForm() {
            this.$refs.contratar.open();
          },
          openFormm() {
            this.$refs.chat.open();
          },
        abrirCerrarFormulario(form){
            this.forms[form].mostrar = !this.forms[form].mostrar;
            //this.$refs[form].listar();
        },
       
    }, 
    created(){

    }
});
app.mount('#app');