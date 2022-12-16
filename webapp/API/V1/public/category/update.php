<?php
	global $database;

	$data = json_decode(file_get_contents("php://input"), true);

	//Return a 400 response if no category information was provided in the request body.
	if (!$data) {
		http_response_code(400);
		die("Please provide the category information as a correct JSON object in the request body.");
	}

	//First try to read the existing category information.
	$result = $database->query("SELECT * FROM category WHERE category_id = " . $args["category_id"] . "");

	//If the category does not exist, return an error. Otherwise just update the information.
	if (!$result || $result === true || $result->num_rows == 0) {
		http_response_code(404);
		die("No such category.");
	}
	else {
		//Generate the update query.
		$query = "";

		foreach ($data as $key => $value) {
			if ($query != "") {
				$query .= ", ";
			}
			$query .= $key . " = '" . $value . "'";
		}

		//Update the entry in the database.
		$result = $database->query("UPDATE category SET " . $query . " WHERE category_id = '" . $args["category_id"] . "'");

		//Return a 500 response if the entry could not be updated in the database.
		if (!$result) {
			http_response_code(500);
			die("Error.");
		}
	}
?>