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

// Initialize error variables for name, email, and password
$nameError = $emailError = $passwordError = "";

// Check if the database connection was unsuccessful
if (!$conn) {
    // Set an error message for email in case of connection failure
    $emailError = "Connection failed";
}

// Check if the form has been submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the provided email already exists in the database
    $sql = "SELECT Email FROM registered_users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    // If email already exists, set an error message
    if (mysqli_num_rows($result) > 0) {
        $emailError = "Email already exists!";
    } else {
        // If email is unique, insert the new user into the database
        $insert_sql = "INSERT INTO registered_users (Name, Email, Password) VALUES ('$name', '$email', '$hashed_password')";

        // If the insertion is successful, set session variables and redirect to the main index page
        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION["user_id"] = mysqli_insert_id($conn);
            $_SESSION["username"] = $name;
            $_SESSION["userEmail"] = $email;

            header('Location: http://localhost/FashionFlix-Website/index.php');
            exit();
        } else {
            // If the insertion fails, set an error message for password
            $passwordError = "Signup failed! There might be a server error. Please try again.";
        }
    }
}

?>