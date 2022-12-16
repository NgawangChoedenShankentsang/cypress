<?php
	global $database;

	//Delete the entry in the database.
	$result = $database->query("DELETE FROM category WHERE category_id = " . $args["category_id"]);

	//Return a 404 response if no category was affected by this query or if an error occurred.
	if ($result !== true || $database->affected_rows == 0) {
		http_response_code(404);
		die("No such category.");
	}
?>