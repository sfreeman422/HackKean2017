var express = require('express');
var bodyParser = require('body-parser');
var morgan = require('morgan');
var path = require('path');
var fs = require('fs');
var multer = require('multer');
var vision = require('./vision.js');
//Instantiate express
var app = express();
var fileName; 
//Create a storage variable that stores the destination and filename of an uploaded image. 
var storage = multer.diskStorage({
	destination: function(req, file, callback){
		callback(null, './private/images');
	},
	filename: function(req, file, callback){
		fileName = file.fieldname+"-"+Date.now()+".png";
		callback(null, fileName);
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
		console.log(fileName);
		//Make a call to the vision API; 
		vision(__dirname+"/private/images/"+fileName);
		//res.end("File is uploaded");
	});
});

//Listener
app.listen(3000, function(err){
	if(err)throw err;
	console.log("Working on port 3000");
});