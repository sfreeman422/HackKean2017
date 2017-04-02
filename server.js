var express = require('express');
var bodyParser = require('body-parser');
var morgan = require('morgan');
var path = require('path');
var fs = require('fs');
var multer = require('multer');
var vision = require('./api-helpers/vision.js');
var walmart = require('./api-helpers/walmart.js')
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
	vision(__dirname+"/private/images/"+fileName, function(data){
		generateRelevantNumbers(data, function(final){
			var stringToSend = "";
			var lengthNum = final.length; 
			for(var i = 0; i<final.length;i++){
				stringToSend += final[i];
			};
			res.redirect("http://hackkean2017-ywjnpeter675499.codeanyapp.com/www/walmartAPI.php?number="+lengthNum+"&itemid="+stringToSend);
			//00000239552000023598235980008998955
		});

		//Makes a call to the walmart API
		// walmart(generateRelevantNumbers(data), function(results){
		// 	res.send(results);
		// });
	});
	});
});

//Function that takes the results of the vision API and strips away irrelevant data, leaving us with only the product IDs
//That we are concerned with. This is a little janky in that it only really works if there are >10 digits present in the codes.
//Anything under that will fail due to the fact that we do not have a way to re-add the missing zeroes that happen once we 
//Turn the string into an int. 
function generateRelevantNumbers(data, cb){
	var receiptFull = data; 
	var splitArr = receiptFull.split(" ");
	var alphabetical = new RegExp("^[A-z]+$");
	var onlyNumbersArr = [];
	var productIdsArr = []; 

	for(var i = 0; i<splitArr.length; i++){
		var newString = ""; 
		for(var j=0; j<splitArr[i].length; j++){
			if(alphabetical.test(splitArr[i].charAt(j))==true){
				newString +="";
			}
			else{
				newString += splitArr[i].charAt(j);
			}
		}
		onlyNumbersArr.push(parseInt(newString, 10));
	}
	for(var i = 0; i < onlyNumbersArr.length; i++){
		if(onlyNumbersArr[i].toString().length == 10){
			var numberString = onlyNumbersArr[i].toString(); 
			var stringToPush = "00"+onlyNumbersArr[i].toString(); 
			productIdsArr.push(stringToPush);
		}
		else if(onlyNumbersArr[i].toString().length == 11){
			var numberString = onlyNumbersArr[i].toString();
			var stringToPush = "0"+onlyNumbersArr[i].toString();  
			productIdsArr.push(stringToPush); 
		}
		else if(onlyNumbersArr[i].toString().length == 12){
			var numberString = onlyNumbersArr[i].toString();
			var stringToPush = onlyNumbersArr[i].toString();  
			productIdsArr.push(stringToPush); 
		}
	}
	cb(productIdsArr);
}

//Listener
app.listen(2000, function(err){
	if(err)throw err;
	console.log("Working on port 3000");
});