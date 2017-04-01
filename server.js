var express = require('express');
var bodyParser = require('body-parser');
var morgan = require('morgan');
var path = require('path');
var fs = require('fs');
var multer = require('multer');
//Instantiate express
var app = express();
var fileName; 
var results; 

//All the VisionAPI stuff
const Vision = require('@google-cloud/vision');
const projectId = 'supermarket-163315';
const visionClient = Vision({
		projectId: projectId
	});
const options = {
		verbose: true
	}

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
	//Upload the file.
	upload(req,res,function(err){
		if(err){
			return res.end("error uploading file. ");
		}
	visionClient.detectText(__dirname+"/private/images/"+fileName, options, function(err,text,apiResponse){
		if(err)throw err;
		var stuff = text[0].desc;
		console.log(text[0].desc);
		console.log(typeof stuff);
		res.send(text[0].desc);
	})		
	});
		//If the file is successfully uploaded, make the request to the visionAPI to parse the data. 
		//vision(__dirname+"/private/images/"+fileName);
		//This should send back the data that we gather from the receipt. 
		//Need to implement a promise, use await or use async. 
});

//Listener
app.listen(3000, function(err){
	if(err)throw err;
	console.log("Working on port 3000");
});