<?php
// db.php

// Database connection parameters
$servername = "localhost"; // Replace with your actual database server name
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "chipiku"; // Replace with your actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
