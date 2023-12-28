<?php
// index.php

// Start or resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["CustomerID"])) {
    // Redirect to the login page or perform other actions
    header("Location: login.php");
    exit();
}

// Assuming you have a function to retrieve user information from the database
// Include the file with the function
// include_once 'user_functions.php';

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

// Retrieve user information
$userID = $_SESSION["CustomerID"];
$userInfo = getUserInfo($userID, $conn);

function getUserInfo($userID, $conn)
{
    $userInfo = [];

    $query = "SELECT * FROM customer WHERE CustomerID = $userID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $userInfo = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

    return $userInfo;
}
// Assume you have a function to get the profile picture path based on the user ID
function getProfilePicture($userID, $conn) {
    // Your SQL query to retrieve the profile picture path
    $query = "SELECT Picture FROM customer WHERE CustomerID = $userID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['Picture'];
    } else {
        // Handle the error or return a default value
        return null;
    }
}

// ...

// Retrieve user information
$userID = $_SESSION["CustomerID"];
$userInfo = getUserInfo($userID, $conn);

// Retrieve profile picture path
$profilePicture = getProfilePicture($userID, $conn);
// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
  <title>Chipiku Stores Dashboard</title>
</head>
<body>
    <div class="row">
        <div class="col-4">
            <img src="../images/chipikulogo.jpg" alt="" class="logo">
        </div>
    </div>
    <div class="row">
    <div class="word-box">
        <div class="col-6">
            <h1>CHIPIKU STORES PROMOTIONS</h1>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="profile">
            <div class="col-2">
                <?php if ($userInfo) : ?>
                    <?php
                    // Construct the full image path
                    $imagePath = $profilePicture;
                    ?>

                    <!-- Display user profile image or default image if not available -->
                    <img src="<?php echo $imagePath ; ?>"style='height: 100px; width= 100px; border-radius= 50%; margin= 0 auto;' alt="Profile Image" class="profile-img">

                    <?php if (isset($userInfo['Firstname'], $userInfo['Lastname'])) : ?>
                        <p class="profile-name"><?php echo $userInfo['Firstname'] . ' ' . $userInfo['Lastname']; ?></p>
                    <?php else : ?>
                        <p>Error: Missing user information.</p>
                    <?php endif; ?>

                    <div class="logout">
                        <p class="logout-text"><a href="logout.php">Logout</a></p>
                    </div>
                <?php else : ?>
                    <p>Error retrieving user information.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<div class="row">
    <div class="functions">
        <div class="col-3">
            <a href="index.php" class="function1">
                <h2>Shopping Cart</h2>
            </a>
            <a href="shopping_list.php" class="function1">
                <h2>My Shopping List</h2>
            </a>
            <a href="report.php" class="function1">
                <h2>My Receipts</h2>
            </a>
            <a href="review.php" class="function1">
                <h2>Reviews</h2>
            </a>
            <a href="promotions.php" class="function1">
                <h2>Promotions</h2>
            </a>
            <a href="settings.php" class="function1">
                <h2>Settings</h2>
            </a>
        </div>
    </div>
</div>
    <div class="row">
        <div class="details">
            <div class="col-9">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="footer">
            <div class="col-12">
                <h3>All rights reserved</h3>
            </div>
        </div>
    </div>
</body>
</html>
