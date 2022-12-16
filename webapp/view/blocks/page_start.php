<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $page_title ?? "Untitled Page"; ?></title>

		<link rel="stylesheet" type="text/css" href="view/stylesheets/style.css">

		<script src="controller/requests.js"></script>
	</head>
	<body>
		<nav>
			<a href="index.php">Home</a>
			<a href="products.php">Products</a>
			<a href="categories.php">Categories</a>
			<a id="login-status" href="#">Log In</a>
		</nav>
		<div class="content-container">
			<div class="content">