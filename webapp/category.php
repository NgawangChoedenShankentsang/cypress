<?php $page_title = "Edit Category ★ Productive"; ?>
<?php require "view/blocks/page_start.php"; ?>
<h1>Edit Category</h1>
<form onsubmit="onEditCategoryFormSubmitted(event);">
	<div class="field">
		<label for="name-field">Category Name</label>
		<input type="text" id="name-field" required>
	</div>

	<div class="field">
		<input type="checkbox" id="active-checkbox">
		<label for="active-checkbox">Active</label>
	</div>

	<div class="field">
		<button type="submit">Save and Close</button>
	</div>
</form>

<script src="controller/category.js"></script>
<?php require "view/blocks/page_end.php"; ?>