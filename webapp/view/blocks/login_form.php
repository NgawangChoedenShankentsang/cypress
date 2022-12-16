<div class="overlay-container" id="login-overlay">
	<div class="overlay">
		<h1>Log in here:</h1>
		<form id="login-form" onsubmit="authenticate(event);">
			<label for="username-field">Username</label>
			<input type="text" id="username-field" placeholder="john.doe">
			<label for="password-field">Password</label>
			<input type="password" id="password-field" placeholder="••••••••">
			<button type="submit">Log in</button>
		</form>
	</div>
</div>
<script src="controller/authentication.js"></script>