process.env.TZ = 'UTC'; // Establece la zona horaria a UTC

const express = require('express');
const app = express();
const http = require('http').Server(app);
const io = require('socket.io')(http, {
  allowEIO3: true,
  cors: {
    origin: 'http://autoassistant.com:8000',
    methods: ['GET', 'POST'],
    allowedHeaders: ['Content-Type', 'Access-Control-Allow-Methods'],
    credentials: true,
  },
});
const { MongoClient } = require('mongodb');

const url = 'mongodb://127.0.0.1:27017';
const client = new MongoClient(url);
const dbname = 'AutoAssistant2';
const port = 3001;

app.use(express.json());

async function conectarMongoDB() {
  await client.connect();
  return client.db(dbname);


}

//funcion para dar formato a la fecha y hora
function generateTimestamp() {
  const date = new Date();
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');
  const hours = String(date.getHours()).padStart(2, '0');
  const minutes = String(date.getMinutes()).padStart(2, '0');
  const seconds = String(date.getSeconds()).padStart(2, '0');
  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

let currentRoom = '';

io.on('connection', (socket) => {
  console.log('Chat Conectado..');

  socket.on('chat', async (chat) => {
    console.log('chat:', chat);
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    const { sender, recipient, message, sala, rolSender } = chat;
    const timestamp = generateTimestamp();
    try {
      // Código para insertar en la base de datos
      collection.insertOne({ sender, recipient, message, sala, rolSender, timestamp, read: false });
      console.log('se insertaron los datos', chat);
    } catch (error) {
      console.log('Error al insertar en la base de datos:', error);
    }
    

    const updatedChat = {
      ...chat,
      timestamp: timestamp,
      read: false,
    };
    console.log('Datos', updatedChat)
    socket.to(currentRoom).emit('chat', updatedChat);
  });

  socket.on('historial', async () => {
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    let chats = await collection.find({sala:currentRoom}).toArray();
    socket.emit('historial', chats);
  });

  socket.on('joinRoom', (room) => {
    console.log('joinRoom:', room);
    currentRoom = room;
    socket.join(room);
    console.log(`El cliente se unió a la sala: ${room}`);
  });
});

app.get('/', (req, resp) => {  
  resp.sendFile(__dirname + '/index.html');
});

http.listen(port, () => {
  console.log('Servidor escuchando en el puerto', port);
});
