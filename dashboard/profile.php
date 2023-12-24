<?php
// Assume you have a function to retrieve user information from the database
function getUserProfileInfo($userID) {
    // Replace this with your actual database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chipiku";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Replace this query with your actual query to retrieve user information
    $query = "SELECT * FROM customer WHERE CustomerID = $userID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return null;
    }

    mysqli_close($conn);
}

// Assume you have a session variable storing the current user's ID
$userID = $_SESSION["CustomerID"]; // Make sure to replace "user_id" with your actual session variable

// Retrieve user information
$userInfo = getUserProfileInfo($userID);
?>
