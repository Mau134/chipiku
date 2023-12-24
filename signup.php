<?php

// Start a session
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "chipiku";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $picture = $_POST["picture"];
    $phoneNumber = $_POST["phoneNumber"];

    // File upload handling
    $targetDirectory = "uploads/"; // Specify your upload directory
    $targetFile = $targetDirectory . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // TODO: Implement validation for password matching and other necessary checks

    // TODO: Implement secure SQL query (use prepared statements)
    $query = "INSERT INTO customer (FirstName, LastName, emailAddress, Gender, Username, Password, Picture, PhoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $lastName, $email, $gender, $username, $password, $picture, $phoneNumber);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            $_SESSION["registration_success"] = "Registration successful. You can now login.";
            echo '<script language="javascript">';
            echo 'alert("Registration Successful!!")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
            exit();
        } else {
            // Error in execution
            $_SESSION["registration_error"] = "Error: " . mysqli_stmt_error($stmt);
            echo '<script language="javascript">';
            echo 'alert("Error in registration please try again")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0; url= register.php">';
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        $_SESSION["registration_error"] = "Error: " . mysqli_error($conn);
        header("Location: register.php");
        exit();
    }
}

// Close the database connection
mysqli_close($conn);

?>
