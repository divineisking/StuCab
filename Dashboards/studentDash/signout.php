<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Regenerate the session ID
session_regenerate_id(true);

// Redirect to the login page (adjust the URL as needed)
header("Location: ../../index.html");
exit();
?>
