<?php

// Start the session to manage user data across requests
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

// Establish a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");

// Check if the database connection is successful
if (!$conn) {
    // If connection fails, display an error message and terminate the script
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted using the POST method and user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    // Retrieve user ID from the session
    $userId = $_SESSION["user_id"];

    // Hash the new password securely
    $newPassword = password_hash(mysqli_real_escape_string($conn, $_POST["new_password"]), PASSWORD_DEFAULT);

    // SQL query to update the user's password in the 'registered_users' table
    $updatePasswordSql = "UPDATE registered_users SET Password = '$newPassword' WHERE UserID = '$userId'";

    // Execute the SQL query
    if (mysqli_query($conn, $updatePasswordSql)) {
        // If the password is successfully updated, redirect to the profile page
        header('Location: http://localhost/FashionFlix-Website/myprofile.php');
        exit();
    } else {
        // If there is an error updating the password, display the error message
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>