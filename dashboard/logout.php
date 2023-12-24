<?php
// Start a session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
echo '<script language="javascript">';
echo 'alert("Loging Out of Dashbaord")';
echo '</script>';
echo '<meta http-equiv="refresh" content="0; url=../index.php">';
exit();
?>
