<?php
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;

	/**
	 * @OA\Get(
	 *     path="/Categories",
	 *     summary="Returns an array containing all categories as objects.",
	 *     tags={"Category"},
	 *     @OA\Response(response="200", description="Success"))
	 */
	$app->get("/Categories", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "category/list.php";
		return $response;
	});

	/**
	 * @OA\Post(
	 *     path="/Category",
	 *     summary="Creates a new category and returns the freshly created category as an object.",
	 *     tags={"Category"},
	 *     requestBody=@OA\RequestBody(
	 *         request="/Category",
	 *         required=true,
	 *         description="A category object. Must not have a category_id property.",
	 *         @OA\MediaType(
	 *             mediaType="application/json",
	 *             @OA\Schema(
	 *                 @OA\Property(property="active", type="integer", example="1"),
	 *                 @OA\Property(property="name", type="string", example="Cool Products")
	 *             )
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success")
	 * )
	 */
	$app->post("/Category", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "category/create.php";
		return $response;
	});

	/**
	 * @OA\Get(
	 *     path="/Category/{category_id}",
	 *     summary="Returns the category object for the given ID.",
	 *     tags={"Category"},
	 *     @OA\Parameter(
	 *         name="Category ID",
	 *         in="path",
	 *         required=true,
	 *         description="The ID of the category.",
	 *         @OA\Schema(
	 *             type="integer",
	 *             example=1
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->get("/Category/{category_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "category/read.php";
		return $response;
	});

	/**
	 * @OA\Put(
	 *     path="/Category/{category_id}",
	 *     summary="Updates and returns the category object for the given ID.",
	 *     tags={"Category"},
	 *     @OA\Parameter(
	 *         name="Category ID",
	 *         in="path",
	 *         required=true,
	 *         description="The ID of the category.",
	 *         @OA\Schema(
	 *             type="integer",
	 *             example=1
	 *         )
	 *     ),
	 *     requestBody=@OA\RequestBody(
	 *         request="/Category/{category_id}",
	 *         required=true,
	 *         description="A category object. Must not have a category_id property.",
	 *         @OA\MediaType(
	 *             mediaType="application/json",
	 *             @OA\Schema(
	 *                 @OA\Property(property="active", type="integer", example="1"),
	 *                 @OA\Property(property="name", type="string", example="Cool Products")
	 *             )
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->put("/Category/{category_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "category/update.php";
		return $response;
	});

	/**
	 * @OA\Delete(
	 *     path="/Category/{category_id}",
	 *     summary="Deletes the category with the given ID.",
	 *     tags={"Category"},
	 *     @OA\Parameter(
	 *         name="Category ID",
	 *         in="path",
	 *         required=true,
	 *         description="The ID of the category.",
	 *         @OA\Schema(
	 *             type="integer",
	 *             example=1
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->delete("/Category/{category_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "category/delete.php";
		return $response;
	});
?>