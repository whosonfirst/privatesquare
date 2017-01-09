var privatesquare = privatesquare || {};

// this assumes two things
// 1. flamework.api.js (included in this repo)
// 2. <body data-api-access-token="..." data-api-endpoint="...">
// if #2 is not to your taste then you should update the code below accordinlgy
// (20160701/thisisaaronland)

function privatesquare_api_call(method, data, on_success, on_error){
    console.log("please stop using privatesquare_api_call and use privatesquare.api.call instead");
    return privatesquare.api.call(method, data, on_success, on_error)
}

privatesquare.api = (function(){

    var _api = undefined;

    var self = {

	'init': function(){

	    _api = new flamework.api();
	    _api.set_handler('endpoint', privatesquare.api.endpoint);
	    _api.set_handler('accesstoken', privatesquare.api.accesstoken);
	},

	'call': function(method, data, on_success, on_error){
	    _api.call(method, data, on_success, on_error);
	},

	'endpoint': function(){
	    return document.body.getAttribute("data-api-endpoint");
	},

	'accesstoken': function(){
	    return document.body.getAttribute("data-api-access-token");
	}
    }

    return self;

})();

window.addEventListener('load', function(e){	
    privatesquare.api.init();
});
