var loginOverlay = document.querySelector("#login-overlay");
var loginStatus = document.querySelector("#login-status");

var usernameField = document.getElementById("username-field");
var passwordField = document.getElementById("password-field");

/**
 * Called as onsubmit event by the login form itself.
 * Submits the login form as an AJAX request.
 * Will hide the overlay on success.
 */
function authenticate(event) {
	event.preventDefault();

	sendRequest("POST", "API/V1/Authenticate", onLoginSuccess, onLoginError, {
		username: usernameField.value,
		password: passwordField.value
	});
}

loginStatus.updateButtonText = function (newText) {
	this.innerText = newText;
}
loginStatus.addEventListener('click', function (e) {
	if (this.innerText === 'Log In') {
		e.preventDefault();
		loginOverlay.show();
	}
})

loginOverlay.show = function () {
	this.classList.add('visible');
}
loginOverlay.hide = function () {
	this.classList.remove('visible');
}

function onLoginSuccess(request) {
	loginStatus.updateButtonText('Log Out');
	loginStatus.href = 'logout.php';
	loginOverlay.hide();
}

function onLoginError(request) {
	alert("Invalid credentials. Please try again!");
}