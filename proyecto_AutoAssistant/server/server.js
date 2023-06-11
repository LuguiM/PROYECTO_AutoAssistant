const express = require('express');
const app = express();
const http = require('http').Server(app);
const io = require('socket.io')(http, {
  allowEIO3: true,
  cors: {
    origin: 'http://autoassistant.com:8000',
    methods: ['GET', 'POST'],
    allowedHeaders: ['Content-Type', 'Access-Control-Allow-Methods'], // Agrega 'Access-Control-Allow-Methods' a los encabezados permitidos
    credentials: true, // Habilitar el uso de cookies u otras credenciales
  },
});
const { MongoClient } = require('mongodb');

const url = 'mongodb://127.0.0.1:27017';
const client = new MongoClient(url);
const dbname = 'ChatAutoAssistant';
const port = 3001;

app.use(express.json());

async function conectarMongoDB() {
  await client.connect();
  return client.db(dbname);
}

const contratacionesNamespace = io.of('/contrataciones');

io.on('connection', (socket) => {
  console.log('Chat Conectado..');

  socket.on('chat', async (chat) => {
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    collection.insertOne(chat);
    socket.broadcast.emit('chat', chat); // envía a todos excepto a mí... es decir, a los demás
  });

  socket.on('historial', async () => {
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    let chats = await collection.find().toArray();
    socket.emit('historial', chats); // se envía solo a mí
  });
});

app.get('/', (req, resp) => {
  resp.sendFile(__dirname + '/index.html');
});

http.listen(port, () => {
  console.log('Servidor escuchando en el puerto', port);
});
