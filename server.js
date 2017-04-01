var express = require('express');
var bodyParser = require('body-parser');
var morgan = require('morgan');
var path = require('path');
var fs = require('fs');
var multer = require('multer');
//Instantiate express
var app = express();
//Create a storage variable that stores the destination and filename of an uploaded image. 
var storage = multer.diskStorage({
	destination: function(req, file, callback){
		callback(null, './private/images');
	},
	filename: function(req, file, callback){
		callback(null, file.fieldname+"-"+Date.now());
	}
});
//Tells the uploaded image to store in the proper directory as sa userphoto. 
var upload = multer({storage: storage}).single('userPhoto');
//App.uses
app.use(morgan("dev"));
app.use(bodyParser({uploadDir:(__dirname+"/private/temporary/images")}));

//Routing
app.get('/', function(req, res){
	res.sendFile(__dirname+"/public/index.html");
});

app.post('/upload', function(req, res){
	upload(req,res,function(err){
		if(err){
			return res.end("error uploading file. ");
		}
		res.end("File is uploaded");
	});
});

//Listener
app.listen(3000, function(err){
	if(err)throw err;
	console.log("Working on port 3000");
});