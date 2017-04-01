//import google cloud client library
const Vision = require('@google-cloud/vision');

//project
const projectId = 'supermarket-163315';

//instantiates a client
const visionClient = Vision({
	projectId: projectId
});

const fileToScan = './image.png' //THIS SHOULD PULL AN IMAGE
const options = {
	verbose: true
}
visionClient.detectText(fileToScan, options, function(err,text,apiResponse){
	console.log(text);
	console.log(apiResponse);
})
