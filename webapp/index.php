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