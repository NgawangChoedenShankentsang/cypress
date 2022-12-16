/**
 * This is the ID of the current category.
 * Will be null when a new category is being created with this page.
 */
var id = null;

var categoryNameField = document.getElementById("name-field");
var activeCheckbox = document.getElementById("active-checkbox");

/**
 * Called when the edit form was submitted.
 * Will try to save the entered data using the API.
 */
function onEditCategoryFormSubmitted(event) {
	event.preventDefault();

	var category = {
		name: categoryNameField.value,
		active: activeCheckbox.checked ? 1 : 0
	};

	//Send a PUT request if this is an edit, or a POST request if it is a new category creation.
	if (id) {
		sendRequest("PUT", "API/V1/Category/" + id, onCategorySaved, onCategorySavingError, category);
	}
	else {
		sendRequest("POST", "API/V1/Category", onCategorySaved, onCategorySavingError, category);
	}
}

/**
 * Called when the category information was successfully saved through the API.
 */
function onCategorySaved(request) {
	window.open("categories.php", "_self");
}

/**
 * Called when an error occurred while saving the category information through the API.
 */
function onCategorySavingError(request) {
	if (request) {
		alert("Could not save the category information because of the following error:\r\n\r\n" + request.responseText);
	}
}

function onCategoryLoaded(request) {
	var category = JSON.parse(request.responseText);

	categoryNameField.value = category.name;
	activeCheckbox.checked = category.active == 1 ? true : false;
}

function onCategoryLoadingError(request) {
	if (request) {
		alert("The requested category could not be loaded because of the following error:\r\n\r\n" + request.responseText);
	}
}

//Load the category information using the ID in the URL if there is any.
//If there is no ID in the URL, we assume that the user wants to create a new category and therefore don't load anything.
var searchKeyValuePairs = window.location.search.substring(1).split("&");
for (var i = 0; i < searchKeyValuePairs.length; i++) {
	var splitted = searchKeyValuePairs[i].split("=");
	if (splitted[0] == "id" && splitted.length > 1) {
		id = splitted[1];
	}
}

//If an SKU was found, load the product data.
if (id) {
	sendRequest("GET", "API/V1/Category/" + id, onCategoryLoaded, onCategoryLoadingError);
}