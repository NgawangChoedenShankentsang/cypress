/**
 * This is the SKU of the current product.
 * Will be null when a new product is being created with this page.
 */
var sku = null;

var skuField = document.getElementById("sku-field");
var productNameField = document.getElementById("name-field");
var descriptionField = document.getElementById("description-field");
var imageField = document.getElementById("image-field");
var priceField = document.getElementById("price-field");
var stockField = document.getElementById("stock-field");
var activeCheckbox = document.getElementById("active-checkbox");
var categorySelect = document.getElementById("category-select");

/**
 * Called when the edit form was submitted.
 * Will try to save the entered data using the API.
 */
function onEditProductFormSubmitted(event) {
	event.preventDefault();

	var product = {
		name: productNameField.value,
		description: descriptionField.value ? descriptionField.value : null,
		product_image: imageField.value ? imageField.value : null,
		price: priceField.value,
		stock: stockField.value,
		active: activeCheckbox.checked ? 1 : 0,
		id_category: categorySelect.value ? categorySelect.value : null
	};

	sendRequest("PUT", "API/V1/Product/" + skuField.value, onProductSaved, onProductSavingError, product);
}

/**
 * Called when the product information was successfully saved through the API.
 */
function onProductSaved(request) {
	window.open("products.php", "_self");
}

/**
 * Called when an error occurred while saving the product information through the API.
 */
function onProductSavingError(request) {
	if (request) {
		alert("Could not save the product information because of the following error:\r\n\r\n" + request.responseText);
	}
}

function onProductLoaded(request) {
	var product = JSON.parse(request.responseText);

	skuField.value = product.sku;
	productNameField.value = product.name;
	descriptionField.value = product.description ? product.description : "";
	imageField.value = product.product_image ? product.product_image : "";
	priceField.value = product.price;
	stockField.value = product.stock;
	activeCheckbox.checked = product.active == 1 ? true : false;
	categorySelect.value = product.id_category ? product.id_category : "";
}

function onProductLoadingError(request) {
	if (request) {
		alert("The requested product could not be loaded because of the following error:\r\n\r\n" + request.responseText);
	}
}

/**
 * Called by categories.js after the categories have been loaded successfully.
 * This will then start to load the product information.
 */
function onCategoriesLoadedCallback() {
	//Populate the category select.
	for (var i = 0; i < categories.length; i++) {
		var categoryOption = document.createElement("option");
		categoryOption.value = categories[i].category_id;
		categoryOption.innerText = categories[i].name + (categories[i].active == 1 ? "" : " (inactive)");
		categorySelect.appendChild(categoryOption);
	}

	//Load the product information using the SKU in the URL if there is any.
	//If there is no SKU in the URL, we assume that the user wants to create a new product and therefore don't load anything.
	var searchKeyValuePairs = window.location.search.substring(1).split("&");
	for (var i = 0; i < searchKeyValuePairs.length; i++) {
		var splitted = searchKeyValuePairs[i].split("=");
		if (splitted[0] == "sku" && splitted.length > 1) {
			sku = splitted[1];
		}
	}

	//If an SKU was found, load the product data.
	if (sku) {
		sendRequest("GET", "API/V1/Product/" + sku, onProductLoaded, onProductLoadingError);

		//Disable the SKU field, as the SKU is not editable on existing products.
		skuField.disabled = true;
	}
	else {
		//Enable the SKU field for new products.
		skuField.disabled = false;
	}
}

//First load the categories for the category select.
loadCategories(onCategoriesLoadedCallback);