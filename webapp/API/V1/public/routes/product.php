<?php
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;

	/**
	 * @OA\Get(
	 *     path="/Products",
	 *     summary="Returns an array containing all products as objects.",
	 *     tags={"Product"},
	 *     @OA\Response(response="200", description="Success"))
	 */
	$app->get("/Products", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "product/list.php";
		return $response;
	});

	/**
	 * @OA\Get(
	 *     path="/Product/{sku}",
	 *     summary="Returns the product object for the given SKU.",
	 *     tags={"Product"},
	 *     @OA\Parameter(
	 *         name="SKU",
	 *         in="path",
	 *         required=true,
	 *         description="The SKU of the product.",
	 *         @OA\Schema(
	 *             type="string",
	 *             example=60003291
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->get("/Product/{sku}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "product/read.php";
		return $response;
	});

	/**
	 * @OA\Put(
	 *     path="/Product/{sku}",
	 *     summary="Updates or creates and then returns the product object for the given SKU.",
	 *     tags={"Product"},
	 *     @OA\Parameter(
	 *         name="SKU",
	 *         in="path",
	 *         required=true,
	 *         description="The SKU of the product.",
	 *         @OA\Schema(
	 *             type="string",
	 *             example=60003291
	 *         )
	 *     ),
	 *     requestBody=@OA\RequestBody(
	 *         request="/Product/{sku}",
	 *         required=true,
	 *         description="A product object. Must not have an sku property.",
	 *         @OA\MediaType(
	 *             mediaType="application/json",
	 *             @OA\Schema(
	 *                 @OA\Property(property="active", type="integer", example="1"),
	 *                 @OA\Property(property="id_category", type="integer", example="1"),
	 *                 @OA\Property(property="name", type="string", example="Nice Product"),
	 *                 @OA\Property(property="image", type="string", example="/path/to/image.png"),
	 *                 @OA\Property(property="description", type="string", example="This is a very fine product with some awesome features."),
	 *                 @OA\Property(property="price", type="decimal", example="9.95"),
	 *                 @OA\Property(property="available_stock", type="integer", example="17")
	 *             )
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->put("/Product/{sku}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "product/update.php";
		return $response;
	});

	/**
	 * @OA\Delete(
	 *     path="/Product/{sku}",
	 *     summary="Deletes the product with the given SKU.",
	 *     tags={"Product"},
	 *     @OA\Parameter(
	 *         name="SKU",
	 *         in="path",
	 *         required=true,
	 *         description="The SKU of the product.",
	 *         @OA\Schema(
	 *             type="string",
	 *             example=60003291
	 *         )
	 *     ),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="404", description="Not found")
	 * )
	 */
	$app->delete("/Product/{sku}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "product/delete.php";
		return $response;
	});
?>