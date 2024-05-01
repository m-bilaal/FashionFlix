<?php

// Start a session
session_start();

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

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in (session contains user email)
    if (isset($_SESSION["userEmail"])) {
        // Retrieve user email and product ID from POST data
        $userEmail = $_SESSION["userEmail"];
        $productId = $_POST["product_id"];

        // SQL query to get the UserID based on the user's email
        $sql = "SELECT UserID FROM registered_users WHERE Email = '$userEmail'";
        $result = mysqli_query($conn, $sql);

        // Check if the query returned a single row
        if (mysqli_num_rows($result) == 1) {
            // Fetch the row and extract UserID
            $row = mysqli_fetch_assoc($result);
            $userId = $row['UserID'];

            // SQL query to insert the product into the cart table
            $insertSql = "INSERT INTO cart (UserID, product_id, quantity, added_at) VALUES ($userId, $productId, 1, NOW())";

            // Execute the insert query
            if (mysqli_query($conn, $insertSql)) {
                // Set a session variable indicating successful addition to cart
                $_SESSION['productAddedToCart'] = true;
                
                // Redirect to the homepage
                header('Location: http://localhost/FashionFlix-Website/index.php');
                exit();
            } else {
                // Display an error message if the insert query fails
                echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        // Redirect to the login page if the user is not logged in
        header('Location: http://localhost/FashionFlix-Website/login.php');
        exit();
    }
}

// Close the database connection
mysqli_close($conn);

?>