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

		// visionClient.readDocument(__dirname+"/private/images/"+fileName)
		// 	.then((data)=>{
		// 		 const results = data[1].responses[0].fullTextAnnotation;
		// 		 const receiptFull = results.text;
		// 		 console.log(receiptFull);
		// 		 var splitArr = receiptFull.split(" ");
		// 		 console.log(splitArr.length);
		// 		 var numArr = []; 
		// 		 var letterArr = []; 
		// 		 for(var i = 0; i < splitArr.length; i++){
		// 		 	console.log(splitArr[i].charAt(0));
		// 		 	if(splitArr[i].charAt(0) == "0" || splitArr[i].charAt(0) == "1" ||splitArr[i].charAt(0) == "2" || splitArr[i].charAt(0) == "3" || splitArr[i].charAt(0) == "4" || splitArr[i].charAt(0) == "5" || splitArr[i].charAt(0) == "6" || splitArr[i].charAt(0) == "7" || splitArr[i].charAt(0) == "8" || splitArr[i].charAt(0) == "9"){
		// 		 		numArr.push(splitArr[i].parseInt());
		// 		 	}
		// 		 	else{
		// 		 		letterArr.push(splitArr[i]);
		// 		 	}
		// 		 	console.log("Number is: "+i);
		// 		 }
		// 		 console.log(splitArr);
		// 		 console.log(numArr);
		// 	});



	visionClient.detectText(__dirname+"/private/images/"+fileName, options, function(err,text,apiResponse){
		if(err)throw err;
		//Holds the full returned value from Vision API
		var receiptFull = text[0].desc;
		console.log(typeof receiptFull);
		var idArr = [];
		console.log(text[0].desc);
		//Split the string out by spaces into the splitArr.
		var splitArr = receiptFull.split(" ");
		console.log("splitArr length is: "+splitArr.length);
		console.log("splitArr is: "+splitArr);
		//Regex to find all upper and lower case numbers. 
		var alphabetical = new RegExp("^[A-z]+$");
		//Regex to find all twelve digit numbers. This one relies on the strings being parsed as ints.  
		var digits = new RegExp("^\d{12}$");
		//Regex to find any twelve characters in the array.
		var twelve = new RegExp("^[A-z0-9]{12}$");
		console.log("array beforehand: "+splitArr);
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
		console.log("New String is: "+newString);
		onlyNumbersArr.push(newString);
		};
		console.log("array with alpha removed: "+onlyNumbersArr);
		
		//Checks for the 12 Digit strings in the array. This doesnt really work because we have strings. If we parseInt, we lose leading zeroes which are required for the query. 
		for(var i = 0; i < onlyNumbersArr.length; i++){
			// console.log("checking for 12");
			// console.log(onlyNumbersArr[i]);
			// console.log(typeof onlyNumbersArr[i]);

			if(twelve.test(onlyNumbersArr[i]) == true){
				console.log("12 digit number: "+onlyNumbersArr[i]);
			}
		};
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