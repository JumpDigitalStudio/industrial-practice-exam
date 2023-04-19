<?php
require_once('../classes/auth.php');
require_once('../classes/user.php');

if (isset($_POST['btnAuth'])) {
	// Get the input values
	$username = $_POST['userName'];
	$password = $_POST['userPass'];

	// Create a new authentication object
	$user_authentication = new UserAuth();

	// Authenticate the user and get the result
	$result = $user_authentication->authenticate($username, $password);

	if ($result) {
		// Create a new user object

		// Redirect to success page
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: " . $address_site . "/pages/client/profile.html");
	} else {
		// Redirect to error page
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: " . $address_site . "/pages/error-data.html");
	}
} else {
	// Redirect to error page
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . $address_site . "/pages/error.html");
}
?>