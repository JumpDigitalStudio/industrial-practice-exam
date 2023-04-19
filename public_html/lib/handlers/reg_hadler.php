<?php
require_once('../classes/reg.php');

if (isset($_POST['btnReg'])) {
	// Get the input values
	$type = $_POST['userType'];
	$full_name = $_POST['userFizName'] ?? $_POST['userUriName'];
	$short_name = $_POST['userFizShort'] ?? $_POST['userUriShort'];
	$passport = $_POST['userFizPassport'] ?? $_POST['userUriPassport'];
	$password = $_POST['userFizPass'] ?? $_POST['userUriPass'];

	// Hash the password
	$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	// Create a new user registration object
	$user_registration = new UserReg();

	// Register the user and get the result
	$result = $user_registration->register($type, $full_name, $short_name, $passport, $password_hashed);

	if ($result) {
		// Redirect to success page
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: " . $address_site . "/index.html");
	} else {
		// Redirect to error page
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: " . $address_site . "/pages/error.html");
	}
} else {
	// Redirect to error page
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . $address_site . "/pages/error.html");
}
?>