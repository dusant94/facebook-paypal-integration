let app = require('express')();
let server = require('http').createServer(app);
let io = require('socket.io')(server);
let Redis = require('ioredis');
let redis = new Redis();

server.listen(3000, function(){
    console.log('Server started at port 3000, CTRL + C to stop.');
});

redis.psubscribe(['*'], function(err, count){
});

redis.on('pmessage', function(subscribe, channel, message){
    message = JSON.parse(message);
    console.log(channel, message);
    io.emit(channel + ':' + message.event, message.data);
});


io.on('connection', function (socket) {
    // console.log('a user connected');
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
});

redis.on('ready', function(){
    console.log("Redis is running");
});
