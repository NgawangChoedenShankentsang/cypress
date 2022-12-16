<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;
	use ReallySimpleJWT\Token;

	require __DIR__ . "/../vendor/autoload.php";

	require "util/database.php";

	header("Content-Type: application/json");

	$app = AppFactory::create();

	$app->setBasePath("/API/V1");

	/**
	 * @OA\Post(
	 *     path="/Authenticate",
	 *     summary="Checks the provided username and password and returns an access token if they are valid. The access token is saved in the cookies.",
	 *     tags={"Authentication"},
	 *     requestBody=@OA\RequestBody(
	 *         request="/Authenticate",
	 *         required=true,
	 *         description="Username and password",
	 *         @OA\MediaType(
	 *             mediaType="application/json",
	 *             @OA\Schema(
	 *                 @OA\Property(property="username", type="string", example="root"),
	 *                 @OA\Property(property="password", type="string", example="sUP3R53CR3T#")
	 *             )
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success")
	 * )
	 */
	$app->post("/Authenticate", function (Request $request, Response $response, $args) {
		$data = json_decode(file_get_contents("php://input"), true);

		require "util/config.php";
		if (!$data || !isset($data["username"]) || !isset($data["password"]) || $data["username"] != $api_username || $data["password"] != $api_password) {
			http_response_code(401);
			die("Invalid credentials.");
		}

		//Generate the access token and store it in a cookie.
		$token = Token::create($data["username"], $data["password"], time() + 3600, "localhost");
		setcookie("token", $token, time() + 3600);

		echo "Success.";

		return $response;
	});

	require "routes/product.php";
	require "routes/category.php";

	$app->run();
?>