
<?php # Script 11.6 - logout.php
$page_title = 'Infinity-Logout';
// This page lets the user logout.
?>
<div><main>
<?php 
session_start();
// If no cookie is present, redirect the user:
if (!isset($_SESSION['customer_id'])) {

	// Need the functions to create an absolute URL:
	require_once ('./login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Delete the cookies.
   $_SESSION=array();
   session_destroy();
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('includes/header.html');

// Print a customized message:
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";
?>
</main></div>
<?php 
include ('includes/footer.html');
?>
