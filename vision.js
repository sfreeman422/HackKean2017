module.exports = function(image){
	//import google cloud client library
	const Vision = require('@google-cloud/vision');

	//project
	const projectId = 'supermarket-163315';

	//instantiates a client
	const visionClient = Vision({
		projectId: projectId
	});

	//const fileToScan = __dirname+'/private/images/userPhoto-1491073066739.png' //THIS SHOULD PULL AN IMAGE
	const options = {
		verbose: true
	}
	visionClient.detectText(image, options, function(err,text,apiResponse){
		if(err)throw err;
		console.log(text[0].desc);
	})
}
