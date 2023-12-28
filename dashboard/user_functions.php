<?php
// user_functions.php

function getUserInfo($userID, $conn) {
    $userInformation = [];

    $query = "SELECT * FROM customer WHERE CustomerID = $userID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $userInformation = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

    return $userInformation;
}
?>
