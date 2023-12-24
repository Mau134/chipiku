<?php

// Start a session
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO: Implement secure SQL query (use prepared statements)
    $query = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if the user exists and the password is correct
        if (mysqli_num_rows($result) > 0) {
            // User authenticated successfully

            // Store user information in session variables
            $user = mysqli_fetch_assoc($result);
            $_SESSION["CustomerID"] = $user["CustomerID"];
            $_SESSION["username"] = $user["username"];

            // Redirect to the dashboard or perform other actions
            echo '<script language="javascript">';
            echo 'alert("Login Successful!!")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0; url=./dashboard/index.php">';
            exit();
        } else {
            // Invalid username or password
            $_SESSION["login_error"] = "Invalid username or password";
            echo '<script language="javascript">';
            echo 'alert("Invalid username or password")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0; url= index.php">';
            exit();
        }
    } else {
        // Error in the SQL query
        $_SESSION["login_error"] = "Error: " . mysqli_error($conn);
        header("Location: index.php");
        exit();
    }
}

// Close the database connection
mysqli_close($conn);
