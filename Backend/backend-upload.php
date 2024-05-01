<?php

// Start a session to manage user data across requests
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "fashion_flix";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $db_name, "3306");

// Check if the database connection is successful
if ($conn->connect_error) {
    // If connection fails, terminate and display an error message
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the POST data
    $productname = $_POST["name"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];

    // Set the directory for file uploads
    $upload_dir = "Photos/";

    // Construct the path for the uploaded product image
    $product_image = $upload_dir . $_FILES["choose"]["name"];
    $upload_file = $upload_dir . basename($_FILES["choose"]["name"]);

    // Get the image type and size
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
    $check = $_FILES["choose"]["size"];

    // Variable to track if the upload is okay
    $upload_ok = 1;

    // Check if the upload is okay
    if ($upload_ok == 1) {
        // Check if product name and price are provided
        if ($productname != "" && $price != "") {
            // Move the uploaded file to the specified directory
            move_uploaded_file($_FILES["choose"]["tmp_name"], $upload_file);

            // SQL query to insert product details into the database
            $sql = "INSERT INTO product(product_name, price, discount, product_image)
                    VALUES ('$productname', $price, $discount, '$product_image')";

            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                // If insertion is successful, display a success message
                echo "<script>alert('Your product has been uploaded successfully.')</script>";
            } else {
                // If there's an error during insertion, display an error message
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // If product name or price is missing, display an error message
            echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
        }
    }
}

// Close the database connection
$conn->close();

?>