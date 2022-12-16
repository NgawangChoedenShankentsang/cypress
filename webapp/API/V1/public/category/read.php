<?php
	global $database;

	//Read the entry from the database.
	$result = $database->query("SELECT * FROM category WHERE category_id = " . $args["category_id"]);

	//Return a 404 response if no entry was found by the query.
	if (!$result || $result === true || $result->num_rows == 0) {
		http_response_code(404);
		die("No such category.");
	}

	//Fetch and output the entry.
	$category = $result->fetch_assoc();

	echo json_encode($category);
?>