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

// Initialize error messages for email and password
$emailError = $passwordError = "";

// Check if the database connection is successful
if (!$conn) {
    $emailError = "Connection failed";
}

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to select user data based on the provided email
    $sql = "SELECT * FROM registered_users WHERE Email = '$email'";
    
    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if a user with the given email exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the provided password against the hashed password stored in the database
        if (password_verify($password, $row['Password'])) {
            // Store user data in session variables
            $_SESSION["user_id"] = $row['UserID'];
            $_SESSION["username"] = $row['Name'];
            $_SESSION["userEmail"] = $email;
            $_SESSION["is_admin"] = ($row['is_admin'] == 1) ? true : false;

            // Redirect to the home page after successful login
            header('Location: http://localhost/FashionFlix-Website/index.php');
            exit();
        } else {
            // Display an error message for incorrect password
            $passwordError = '<i class="fa-solid fa-exclamation-circle"></i> Incorrect password!';
        }
    } else {
        // Display an error message for email not found
        $emailError = '<i class="fa-solid fa-exclamation-circle"></i> Email not found!';
    }
}

// Output a link to the stylesheet for styling purposes
echo '<link rel="stylesheet" href="/FashionFlix-Website/CSS/bodylogin.css">';

?>