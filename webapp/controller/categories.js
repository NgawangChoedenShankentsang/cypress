var loadCategoriesCallback = null;
var categoriesTable = document.getElementById("categories-table");

/**
 * The array of all loaded categories.
 * Will be populated after the categories have been loaded.
 */
var categories = [ ];

/**
 * Loads the categories through the API.
 * @param callback An optional callback that is called when the categories have been loaded. This is used for the product edit page.
 */
function loadCategories(callback = null) {
	loadCategoriesCallback = callback;

	sendRequest("GET", "API/V1/Categories", onCategoriesLoaded, onCategoriesLoadingError);
}

/**
 * Called when the categories have been loaded successfully.
 */
function onCategoriesLoaded(request) {
	//Fill the categories array.
	categories = JSON.parse(request.responseText);

	//Call the callback if there is one.
	if (loadCategoriesCallback) {
		loadCategoriesCallback();
	}
}

/**
 * Called when an error occurred while loading the categories.
 */
function onCategoriesLoadingError(request) {
	if (request && request.status != 401) {
		alert("Could not load the product categories because of the following error:\r\n\r\n" + request.responseText);
	}
}

/**
 * Loads the categories for the category list.
 */
function loadCategoryList() {
	loadCategories(onCategoriesLoadedForList);
}

/**
 * Called when the categories have been loaded for display in the great category list.
 */
function onCategoriesLoadedForList() {
	//Remove the old entries if there are any.
	categoriesTable.innerHTML = "";

	//Add the new category data to the table.
	for (var i = 0; i < categories.length; i++) {
		var categoryRow = document.createElement("tr");
		categoriesTable.appendChild(categoryRow);

		var nameCell = document.createElement("td");
		nameCell.innerText = categories[i].name;
		categoryRow.appendChild(nameCell);

		var activeCell = document.createElement("td");
		activeCell.innerText = categories[i].active;
		categoryRow.appendChild(activeCell);

		var actionsCell = document.createElement("td");
		categoryRow.appendChild(actionsCell);

		var deleteButton = document.createElement("button");
		deleteButton.innerText = "Delete";
		deleteButton.onclick = onDeleteButtonPressed;
		deleteButton.className = "destructive";
		deleteButton.setAttribute("category-id", categories[i].category_id);
		actionsCell.appendChild(deleteButton);

		var editButton = document.createElement("a");
		editButton.innerText = "Edit";
		editButton.className = "button";
		editButton.href = "category.php?id=" + categories[i].category_id;
		actionsCell.appendChild(editButton);
	}
}

/**
 * Called when the delete button is pressed on one of the category table rows.
 * @param event The event object.
 */
function onDeleteButtonPressed(event) {
	var id = event.currentTarget.getAttribute("category-id");
	if (!confirm("Are you sure that you want to delete the category with the ID " + id + "?")) {
		return;
	}

	sendRequest("DELETE", "API/V1/Category/" + id, onCategoryDeleted, onCategoryDeletionError);
}

/**
 * Called when the category deletion request succeeded.
 * @param request The request object.
 */
function onCategoryDeleted(request) {
	loadCategoryList();
}

/**
 * Called when the category deletion request failed.
 * @param request The request object.
 */
function onCategoryDeletionError(request) {
	alert("The product could not be deleted. Please try again!");
}