<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mensajería') }}
        </h2>
    </x-slot>
    <br>
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card" style="height: 600px;">
                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                        style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">Chat messages</h5>
                        <div class="d-flex flex-row align-items-center">
                            <span class="badge bg-warning me-3">20</span>
                            <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                            <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                            <i class="fas fa-times text-muted fa-xs"></i>
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar="true"
                        style="position: relative; height: 400px; overflow-y: auto;">

                        <div class="d-flex justify-content-between">
                            <p class="small mb-1">Timona Siera</p>
                            <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-3 rounded-3"
                                    style="background-color: #f5f6f7;">For what reason would it be advisable for
                                    me to think about business content?</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                            <p class="small mb-1">Johny Bullock</p>
                        </div>
                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                            <div>
                                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Thank you for your
                                    believe in our supports</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>
                    </div>
                    <div id="chat-messages" data-contratacion-id="{{ $contratacionId }}">
                    <p>Conductor ID: {{ $conductorId }}</p>
                    <p>Mecánico ID: {{ $mecanicoId }}</p>
                    <p>contratacion ID: {{ $contratacionId }}</p>
                    </div>

                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                        <div class="input-group mb-0">
                            <form id="chat-form">
                                <input type="text" id="message-input" class="form-control" placeholder="Escribe tu mensaje"
                                    aria-label="Recipient's username" aria-describedby="button-addon2" />
                                <button class="btn btn-warning" type="submit" id="button-addon2"
                                    style="padding-top: .55rem;">
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
  // Conectarse al servidor de Socket.io
  const socket = io('http://localhost:3001');

  // Obtener el ID del conductor y mecánico desde el backend
  const conductorId = '{{ $conductorId }}';
  const mecanicoId = '{{ $mecanicoId }}';

    // Unirse a una sala de chat basada en los IDs del conductor y mecánico
    const contratacionId = document.getElementById('chat-messages').getAttribute('data-contratacion-id');
    console.log(contratacionId);
    const room = 'contratacion_' + contratacionId;
    socket.emit('joinRoom', room);

    function formatDate(timestamp) {
    const date = new Date(timestamp);
    const formattedDate = date.toLocaleDateString(); // Formato de fecha personalizado
    const formattedTime = date.toLocaleTimeString(); // Formato de hora personalizado
    return `${formattedDate} ${formattedTime}`;
    }

  // Escuchar eventos de chat para recibir mensajes del servidor
  socket.on('chat', (chatMessage) => {
   // Mostrar el mensaje en el chat
  const chatMessages = document.getElementById('chat-messages');
  const { sender: messageSender, message, timestamp: chatTimestamp } = chatMessage;
  const formattedTimestamp = formatDate(chatTimestamp);
  const messageElement = document.createElement('div');
  messageElement.innerText = `${formattedTimestamp} - ${messageSender}: ${message}`;
  chatMessages.appendChild(messageElement);

  // Aquí puedes acceder a los campos adicionales y mostrar la información correspondiente
  const { sender, timestamp, read } = chatMessage;
  // ...
  });

  // Obtener el historial de chat al cargar la página
  socket.emit('historial');

  socket.on('historial', (chats) => {
    // Lógica para procesar y mostrar el historial de chat en la interfaz de usuario

  const chatMessages = document.getElementById('chat-messages'); // Variable chatMessages definida aquí

chats.forEach((chat) => {
  const { sender, message, timestamp, read } = chat;
  const formattedTimestamp = formatDate(timestamp);
  const messageElement = document.createElement('div');
  messageElement.innerText = `${formattedTimestamp} - ${sender}: ${message}`;
  chatMessages.appendChild(messageElement);
});

  });

  // Manejar el envío de mensajes desde el formulario
const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message-input');
const sender = '{{ Auth::user()->name }}'; // Nombre del remitente obtenido desde el backend
const read = false; // Estado de lectura inicialmente establecido en false

chatForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const userMessage = messageInput.value.trim();

  if (userMessage !== '') {
    // Enviar el mensaje al servidor
    socket.emit('chat', {
      room,
      sender,
      message: userMessage,
      timestamp: new Date().toISOString(),
      read,
    });

    // Limpiar el campo de entrada de mensajes
    messageInput.value = '';
  }
});
</script>