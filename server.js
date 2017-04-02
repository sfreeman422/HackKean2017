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
	//Makes the request to the vision api using our image. 
	visionClient.detectText(__dirname+"/private/images/"+fileName, options, function(err,text,apiResponse){
		if(err)throw err;
		//Holds the full returned value from Vision API
		var receiptFull = text[0].desc;
		console.log(typeof receiptFull);
		var idArr = [];
		console.log(text[0].desc);
		//Split the string out by spaces into the splitArr.
		var splitArr = receiptFull.split(" ");
		//Regex to find all upper and lower case numbers. 
		var alphabetical = new RegExp("^[A-z]+$");
		//Regex to find all twelve digit numbers. This one relies on the strings being parsed as ints.  
		var digits = new RegExp("^\d{12}$");
		//Regex for dollars. 
		var dollars = new RegExp("^\[0-9]+(.[0-9]+)$");
		//Regex to find any twelve characters in the array.
		var twelve = new RegExp("^\d{12}$");
		var eleven = new RegExp("^\d{11}$");
		var ten = new RegExp("^\d{10}$");
		var onlyNumbersArr = [];
		//Removes the Alphabetical Characters from the array. 
		for(var i = 0; i < splitArr.length; i++){
			var newString="";
			for(var j = 0; j< splitArr[i].length; j++){
				if(alphabetical.test(splitArr[i].charAt(j))== true){
					newString += ""; 
				}
				else{
					newString += splitArr[i].charAt(j); 
				}
			}
		onlyNumbersArr.push(parseInt(newString));
		};
		console.log("array with alpha removed: "+onlyNumbersArr);
		
		//Checks for the 12 Digit strings in the array. This doesnt really work because we have strings. If we parseInt, we lose leading zeroes which are required for the query. 
		for(var i = 0; i < onlyNumbersArr.length; i++){
			if(twelve.test(onlyNumbersArr[i]) == true){
				console.log("12 digit number: "+onlyNumbersArr[i]);
			}
			else if(eleven.test(onlyNumbersArr[i] == true)){
				console.log("11 Digit Number: "+onlyNumbersArr[i]);
			}
			else if(ten.test(onlyNumbersArr[i] == true)){
			 	console.log("10 Digit Number: "+onlyNumbersArr[i]);
			}
			else{
				console.log("Nothing found");
				console.log("length: "+onlyNumbersArr[i].length);
			}
		};
		res.send(onlyNumbersArr);
	})		
	});
});

//Listener
app.listen(3000, function(err){
	if(err)throw err;
	console.log("Working on port 3000");
});