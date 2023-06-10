const { Socket } = require('socket.io');

const express = require('express'),
    app = express(),
    http = require('http').Server(app),
    io = require('socket.io')(http, {
        allowEIO3: true,
        cors:{
            origin: ['http://autoassistant.com:8000'],
            Credential: true,
        }
    }),
    {MongoClient} = require('mongodb'),
    url = 'mongodb://127.0.0.1:27017',
    client = new MongoClient(url),
    dbname = 'ChatAutoAssistant';
    port = 3001;
app.use(express.json());

async function conectarMongoBD(){
    await client.connect();
    return client.db(dbname);
}

io.on('connect', socket=>{
    console.log('Chat Conectado..');

    socket.on('chat', async chat=>{
        let db = await conectarMongoBD(),
            collection = db.collection('chat');
        collection.insertOne(chat);
        socket.broadcast.emit('chat', chat); // envia a todos menos a mi ... es deci a los demas
    });
    socket.on('historial', async()=>{
        let db = await conectarMongoBD(),
            collection = db.collection('chat'),
            chats = await collection.find().toArray();
        socket.emit('historial', chats); //se envia solo a mi
    })
})

http.listen(port, event=>{
    console.log('Servidor escuchado en el puerto', port);
})