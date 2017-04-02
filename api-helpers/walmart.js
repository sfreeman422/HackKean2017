function getWalmart(productIds, cb){
	var request = require('request');
	var itemInfo = [];
	var queryString = "";
	for(var i = 0; i < productIds.length; i++){
		if(i!=productIds.length-1){
			queryString += productIds[i]+",";
		}
		else{
			queryString += productIds[i];
		}
	}
	console.log(queryString);
	request("http://api.walmartlabs.com/v1/items?ids="+queryString+"&apiKey=bt2hkmve2uxc8tmfzwn42kfy", function(error, response, body){
		console.log('error:', error);
		console.log('statusCode:', response &&response.statusCode);
		console.log('body:', body);
	})
	//cb(itemInfo);
};

module.exports = getWalmart; 