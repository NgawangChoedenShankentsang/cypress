<?php $page_title = "Manage Categories ★ Productive"; ?>
<?php require "view/blocks/page_start.php"; ?>
<h1>Manage Categories</h1>
<div style="margin-bottom: 2em;">
	<a href="category.php" class="button">Create New Category</a>
</div>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody id="categories-table"></tbody>
</table>

<script src="controller/categories.js"></script>
<script>loadCategoryList();</script>
<?php require "view/blocks/page_end.php"; ?>