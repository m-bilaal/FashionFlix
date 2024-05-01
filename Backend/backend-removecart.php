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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["userEmail"])) {
    // Retrieve cart ID from the form data
    $cartId = $_POST["cart_id"];

    // SQL query to remove a cart item based on the provided cart ID
    $removeQuery = "DELETE FROM cart WHERE cart_id = $cartId";

    // Execute the SQL query
    if (mysqli_query($conn, $removeQuery)) {
        // If the record is successfully removed, redirect to the cart page
        header('Location: http://localhost/FashionFlix-Website/cart.php');
        exit();
    } else {
        // If there is an error removing the record, display the error message
        echo "Error removing record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>