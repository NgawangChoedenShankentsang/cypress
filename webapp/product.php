<?php $page_title = "Edit Product ★ Productive"; ?>
<?php require "view/blocks/page_start.php"; ?>
<h1>Edit Product Information</h1>
<form onsubmit="onEditProductFormSubmitted(event);">
	<div class="field">
		<label for="name-field">Product Name</label>
		<input type="text" id="name-field" required>
	</div>

	<div class="field">
		<label for="sku-field">SKU</label>
		<input type="text" id="sku-field" required>
	</div>

	<div class="field">
		<input type="checkbox" id="active-checkbox">
		<label for="active-checkbox">Active</label>
	</div>

	<div class="field">
		<label for="category-select">Category</label>
		<select id="category-select">
			<option value="">(not listed)</option>
		</select>
	</div>

	<div class="field">
		<label for="description-field">Description</label>
		<textarea id="description-field"></textarea>
	</div>

	<div class="field">
		<label for="image-field">Image URL</label>
		<input type="text" id="image-field">
	</div>

	<div class="field">
		<label for="price-field">Price</label>
		<input type="number" id="price-field" min="0" required step=".01">
	</div>

	<div class="field">
		<label for="weight-field">Weight (g)</label>
		<input type="number" id="weight-field" min="0" step=".01">
	</div>

	<div class="field">
		<label for="stock-field">Stock</label>
		<input type="number" id="stock-field" min="0" required>
	</div>

	<div class="field">
		<button type="submit">Save and Close</button>
	</div>
</form>

<script src="controller/categories.js"></script>
<script src="controller/product.js"></script>
<?php require "view/blocks/page_end.php"; ?>
