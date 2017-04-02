function getWalmart(productIds, cb){
	var request = require('request');
	var itemInfo = [];
	var queryString = "";
for(var i = 0; i < productIds.length; i++){
	request("http://api.walmartlabs.com/v1/search?apiKey=bt2hkmve2uxc8tmfzwn42kfy&query="+productIds[i], function(error, response, body){
			console.log('error:', error);
			console.log('statusCode:', response && response.statusCode);
			console.log('body:', body);
			var newBody = JSON.parse(body);
			if(newBody.message == "Results not found!"){
				console.log("Unable to find:"+newBody.query);
			}
			else{
				var itemObject = {
					query: newBody.query,
					name: newBody.items[0].name,
					price: newBody.items[0].msrp,
					category: newBody.items[0].categoryPath
				}
				itemInfo.push(itemObject);
			}
		});
}

cb(itemInfo);
};

module.exports = getWalmart; 