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
const dbname = 'ChatAutoAssistant';
const port = 3001;

app.use(express.json());

async function conectarMongoDB() {
  await client.connect();
  return client.db(dbname);
}

io.on('connection', (socket) => {
  console.log('Chat Conectado..');

  socket.on('chat', async (chat) => {
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    collection.insertOne(chat);
    socket.to(chat.room).emit('chat', chat);
  });

  socket.on('historial', async () => {
    let db = await conectarMongoDB();
    let collection = db.collection('chat');
    let chats = await collection.find().toArray();
    socket.emit('historial', chats);
  });

  socket.on('joinRoom', (room) => {
    socket.join(room);
  });
});

app.get('/', (req, resp) => {
  resp.sendFile(__dirname + '/index.html');
});

http.listen(port, () => {
  console.log('Servidor escuchando en el puerto', port);
});
