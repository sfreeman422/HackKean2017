const express = require('express');
const app = express();
const morgan = require('morgan');

app.use(morgan("dev"));

app.get('/', function(req, res){
	res.sendFile(__dirname+"/public/index.html");
});

app.listen(3000);