<?php
// submit_review.php

// Include the database connection code (similar to what you have in your index.php)
include_once 'db.php';

// Start or resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["CustomerID"])) {
    // Redirect to the login page or perform other actions
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the review text from the form
    $reviewText = mysqli_real_escape_string($conn, $_POST["reviewText"]);

    // Get the user ID from the session
    $userID = $_SESSION["CustomerID"];

    // Insert the review into the database
    $insertQuery = "INSERT INTO reviews (CustomerID, date, time, text) VALUES ($userID, CURDATE(), CURTIME(), '$reviewText')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Review inserted successfully
        header("Location: review.php"); // Redirect back to the main page or wherever you want
        exit();
    } else {
        // Handle the error
        echo "Error in query: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
