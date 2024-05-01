<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

// Establish a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize an empty array to store cart items
$cartItems = [];

// Check if user is logged in (using session data)
if (isset($_SESSION["userEmail"])) {
    $userEmail = $_SESSION["userEmail"];

    // Retrieve UserID based on user's email
    $userIdQuery = "SELECT UserID FROM registered_users WHERE Email = '$userEmail'";
    $userIdResult = mysqli_query($conn, $userIdQuery);

    // If a single matching user is found
    if (mysqli_num_rows($userIdResult) == 1) {
        $row = mysqli_fetch_assoc($userIdResult);
        $userId = $row['UserID'];

        // Query to retrieve cart items for the user
        $cartQuery = "SELECT c.cart_id, p.product_image, p.product_name, p.price, c.quantity
                      FROM cart c
                      INNER JOIN product p ON c.product_id = p.product_id
                      WHERE c.UserID = $userId";

        $cartResult = mysqli_query($conn, $cartQuery);

        // If there are cart items, fetch and store them in the $cartItems array
        if (mysqli_num_rows($cartResult) > 0) {
            while ($cartRow = mysqli_fetch_assoc($cartResult)) {
                $cartItems[] = $cartRow;
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);

?>