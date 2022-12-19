<?php $page_title = "Home ★ Productive"; ?>
<?php require "view/blocks/page_start.php"; ?>
<h1>Welcome to Productive!</h1>
<div style="margin-bottom: 2em;">
    <h3>Here are some of our popular Products</h3>
</div>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Stock</th>
		</tr>
	</thead>
	<tbody id="active-products-table"></tbody>
</table>
<script src="controller/active-products.js"></script>
<?php require "view/blocks/page_end.php"; ?>
<script>
class UserService {
	validateUsername = function (username) {
    function fizzbuzz(num) {
  if (num % 3 === 0 && num % 5 === 0) {
    return "FizzBuzz";
  } else if (num % 3 === 0) {
    return "Fizz";
  } else if (num % 5 === 0) {
    return "Buzz";
  } else {
    return num;
  }
}

  }
}

window.UserService = UserService;
</script>