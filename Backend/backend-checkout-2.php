<?php

// Start a session to access session variables
session_start();

// Database connection details
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'fashion_flix';

// Establish a connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Retrieve shipping data from session
    $shippingData = $_SESSION['shipping_data'];

    // Sanitize and escape payment method from the form
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment-method']);

    // Retrieve user ID from session data
    $userId = $_SESSION["user_id"];

    // SQL query to insert shipping details into the database
    $sql = "INSERT INTO shipping (UserID, Name, Email, Phone, Country, State, City, Address, Code, Payment) 
            VALUES ('$userId', '{$shippingData['name']}', '{$shippingData['email']}', '{$shippingData['phone']}', 
                    '{$shippingData['country']}', '{$shippingData['state']}', '{$shippingData['city']}', 
                    '{$shippingData['address']}', '{$shippingData['code']}', '$paymentMethod')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // Clear the shipping data from the session
        unset($_SESSION['shipping_data']);
        
        // Redirect to the next checkout step
        header("Location: /FashionFlix-Website/checkout-3.php");
        exit();
    } else {
        // Display an error message if the query fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>