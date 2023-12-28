<?php
session_start();

include_once 'db.php';

if (!isset($_SESSION["CustomerID"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewID = $_POST["reviewID"];
    $newReviewText = $_POST["newReviewText"];


    // Update the review text in the database
    $updateQuery = "UPDATE reviews SET text = '$newReviewText' WHERE ReviewsId = $reviewID";

    if (mysqli_query($conn, $updateQuery)) {
        // Success: Redirect back to the dashboard or reviews section
        header("Location: dashboard.php#reviews-section");
        exit();
    } else {
        // Error handling
        echo "Error updating review: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle invalid requests
    header("Location: dashboard.php");
    exit();
}
?>
