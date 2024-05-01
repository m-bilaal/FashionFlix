<?php

// Start a session to manage user data across requests
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
    // If connection fails, terminate and display an error message
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST and user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["userEmail"])) {
    // Retrieve cart ID and new quantity from the POST data
    $cartId = $_POST["cart_id"];
    $newQuantity = $_POST["quantity"];

    // SQL query to update the quantity in the cart
    $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE cart_id = $cartId";

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) {
        // If update is successful, redirect to the cart page
        header('Location: http://localhost/FashionFlix-Website/cart.php');
        exit();
    } else {
        // If there's an error during the update, display an error message
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>