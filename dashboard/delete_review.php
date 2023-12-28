<?php
session_start();
include_once "db.php";

if (!isset($_SESSION["CustomerID"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewID = $_POST["reviewID"]; // Assuming you have a hidden field in the form to pass the review ID

    // Delete the review from the database
    $deleteQuery = "DELETE FROM reviews WHERE ReviewsId = $reviewID";

    // Redirect back to the dashboard or the reviews section
    header("Location: dashboard.php#reviews-section");
    exit();
} else {
    // Handle invalid requests
    header("Location: dashboard.php");
    exit();
}
