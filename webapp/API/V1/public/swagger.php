<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

	/**
	 * @OA\Info(title="Fresh Shop API", version="1")
	 */

	require("../vendor/autoload.php");
	$openapi = \OpenApi\Generator::scan([__DIR__]);
	//header('Content-Type: application/x-yaml');
	echo $openapi->toYaml();
?>