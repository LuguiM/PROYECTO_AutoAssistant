<template>
    
</template>
<script>
import alertify from 'alertifyjs';

export default (await import('vue')).defineComponent({
        data() {
            return {
                chats:[],
                chat:{
                    from: 'usuario',
                    to: 'todos',
                    message:'',
                    status:'',
                    fecha: new Date()
                }
            }
        },
        methods:{
            guardarChat(){
                if(this.chat.msg!=''){
                    this.chats.push({...this.chat});
                    socketio.emit('chat',this.chat);
                }else{
                    alertify.error('Por favor escriba un mensaje');
                }
            },
            obtenerHistorial(){
                socketio.emit('historial');
                socketio.on('historial', chats=>{
                    this.chats = chats;
                });
            }
        },
        created(){
            this.obtenerHistorial();
            socketio.on('chat', chat=>{
                this.chats.push(chat);
            });
            
        }
    })
</script>
