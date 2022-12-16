var request = null;
var currentSuccessCallback = null;
var currentErrorCallback = null;

function sendRequest(method, url, successCallback, errorCallback, body = null) {
	if (request) {
		alert("A request is already running. Please wait until it finished and try again afterwards!");
		errorCallback(null);
		return;
	}

	currentSuccessCallback = successCallback;
	currentErrorCallback = errorCallback;

	//Stringify the request body if there is one.
	var stringBody = null;
	if (body) {
		stringBody = JSON.stringify(body);
	}

	request = new XMLHttpRequest();
	request.open(method, url);
	request.setRequestHeader("Content-Type", "application/json");
	request.onreadystatechange = onReadyStateChange;
	request.send(stringBody);
}

function onReadyStateChange(event) {
	//Do nothing if the request has not yet received an answer.
	if (request.readyState < 4) {
		return;
	}

	//Reset the request variable.
	var finishedRequest = request;
	request = null;

	//Show the login overlay if the response code is 401.
	//Will also call the error callback.
	if (finishedRequest.status == 401) {
		loginOverlay.show();
	}

	//Call the error callback if the response code is not 200 or 201.
	if (finishedRequest.status != 200 && finishedRequest.status != 201) {
		currentErrorCallback(finishedRequest);

		return;
	}

	//If we arrive here, all went right and therefore we call the success callback.
	if(loginStatus) {
		loginStatus.href = 'logout.php';
		loginStatus.updateButtonText('Log Out');
	}
	currentSuccessCallback(finishedRequest);
}