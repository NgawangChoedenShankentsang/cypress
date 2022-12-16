<?php
	global $database;

	//Delete the entry in the database.
	$result = $database->query("DELETE FROM product WHERE sku = '" . $args["sku"] . "'");

	//Return a 404 response if no product was affected by this query or if an error occurred.
	if ($result !== true || $database->affected_rows == 0) {
		http_response_code(404);
		die("No such product.");
	}
?>