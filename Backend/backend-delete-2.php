<?php

// Start the session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "fashion_flix";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $db_name, "3306");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted using the POST method and if the "change" parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change"])) {

    // Retrieve data from the form
    $productname = $_POST["name"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];

    // Escape user input to prevent SQL injection
    $productname = mysqli_real_escape_string($conn, $productname);
    $price = (float)$price;
    $discount = (float)$discount;

    // SQL query to update product information in the 'product' table
    $updateSql = "UPDATE product SET price = ?, discount = ? WHERE product_name = ?";
    
    // Prepare and bind the SQL query
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("dds", $price, $discount, $productname);

    // Execute the SQL query
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Display a success message using JavaScript alert if the update is successful
            echo "<script>alert('Your product has been updated successfully.')</script>";
        } else {
            // Display a message using JavaScript alert if the product was not found
            echo "<script>alert('Your product was not found.')</script>";
        }
    } else {
        // Display an error message using JavaScript alert if there is an error during the update
        echo '<script>alert("Sorry, there was an error updating your file.")</script>' . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>