To use this API, you must create a PHP file under public/util/config.php and add the following code.
Make sure to adjust the credentials to your environment.
Please notice that the API password must contain at least one upper- and one lowercase letter as well as one number and one of the special characters *&!@%^#$.

Place this code in public/util/config.php:

```php
<?php
	//API credentials.
	$api_username = "root";
	$api_password = "sUP3R53CR3T#";

	//Database connection information.
	$db_hostname = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_database = "test";
?>
```
