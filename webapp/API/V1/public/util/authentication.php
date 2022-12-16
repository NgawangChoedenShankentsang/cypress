<?php
	use ReallySimpleJWT\Token;

	require "util/config.php";

	//Return a 401 response if there is no token or the provided token is invalid.
	if (!isset($_COOKIE["token"]) || !Token::validate($_COOKIE["token"], $api_password)) {
		http_response_code(401);
		die("Please provide a valid access token!");
	}
?>