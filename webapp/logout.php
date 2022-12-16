<?php
	setcookie("token", null, -1, "/API/V1");
	header("Location: index.php");
?>