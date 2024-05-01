<?php

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

// Check if the form is submitted using the POST method and if the "delete" parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

    // Retrieve the product name from the form data
    $productname = $_POST["name"];

    // SQL query to delete a product from the 'product' table based on the product name
    $deleteSql = "DELETE FROM product WHERE product_name = '$productname'";

    // Execute the SQL query
    if ($conn->query($deleteSql) === TRUE) {
        // Display a success message using JavaScript alert if the deletion is successful
        echo "<script>alert('Your product has been deleted successfully.')</script>";
    } else {
        // Display an error message using JavaScript alert if there is an error during deletion
        echo '<script>alert("Sorry, there was an error deleting your file.")</script>' . $conn->error;
    }
}

?>
