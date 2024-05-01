<?php

// Start a new session or resume the existing session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

// Establish a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");

// Check if the database connection was unsuccessful
if (!$conn) {
    // Redirect to the signup page with an error message if the connection fails
    header('Location: http://localhost/signup.php?useremail="Either Email or Password is incorrect!!"');
    exit(); // Stop further execution of the script
}

// Destroy the current session and clear session data
session_destroy();

// Unset and expire the "username" cookie
setcookie("username", "", time() - 300, "/");

// Redirect to the main index page of the FashionFlix website
header('Location: http://localhost/FashionFlix-Website/index.php');
exit(); // Stop further execution of the script

?>