<?php $page_title = "Manage Products ★ Productive"; ?>
<?php require "view/blocks/page_start.php"; ?>
<h1>Manage Products</h1>
<div style="margin-bottom: 2em;">
	<a href="product.php" class="button">Create New Product</a>
</div>
<table>
	<thead>
		<tr>
			<th>SKU</th>
			<th>Name</th>
			<th>Active</th>
			<th>Price</th>
			<th>Stock</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody id="products-table"></tbody>
</table>

<script src="controller/products.js"></script>
<?php require "view/blocks/page_end.php"; ?>