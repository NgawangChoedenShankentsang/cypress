<?php
	global $database;

	$data = json_decode(file_get_contents("php://input"), true);

	//Return a 400 response if no product information was provided in the request body.
	if (!$data) {
		http_response_code(400);
		die("Please provide the product information as a correct JSON object in the request body.");
	}

	//First try to read the existing product information.
	$result = $database->query("SELECT * FROM product WHERE sku = '" . $args["sku"] . "'");

	//If the product does not exist, create it. Otherwise just update the information.
	if (!$result || $result === true || $result->num_rows == 0) {
		//Make sure the required fields are provided.
		if (!isset($data["name"]) || !isset($data["stock"]) || !isset($data["active"])) {
			http_response_code(400);
			die("You must provide at least the attributes \"name\", \"stock\" and \"active\".");
		}

		$id_category = "NULL";
		if (isset($data["id_category"])) {
			$id_category = $data["id_category"];
		}

		$product_image = "NULL";
		if (isset($data["product_image"])) {
			$product_image = "'" . $data["product_image"] . "'";
		}

		$description = "NULL";
		if (isset($data["description"])) {
			$description = "'" . $data["description"] . "'";
		}

		$price = "NULL";
		if (isset($data["price"])) {
			$price = $data["price"];
		}

		//Insert the data into the database.
		$result = $database->query("INSERT INTO product(id_category, name, product_image, description, price, stock, active, sku) VALUES(" . $id_category . ", '" . $data["name"] . "', " . $product_image . ", " . $description . ", " . $price . ", " . $data["stock"] . ", " . $data["active"] . ", '" . $args["sku"] . "')");

		//Return a 500 response if there was an error with the query.
		if (!$result) {
			http_response_code(500);
			die("Error.");
		}

		//Return a 201 response if the entry was successfully created.
		http_response_code(201);
		die();
	}
	else {
		//Generate the update query.
		$query = "";

		foreach ($data as $key => $value) {
			if ($query != "") {
				$query .= ", ";
			}
			$query .= $key . " = " . ($value !== null ? "'" . $value . "'" : "NULL");
		}

		//Update the entry in the database.
		$result = $database->query("UPDATE product SET " . $query . " WHERE sku = '" . $args["sku"] . "'");

		//Return a 500 response if the entry could not be updated in the database.
		if (!$result) {
			http_response_code(500);
			die("Error.");
		}
	}
?>