<?php

// Start a session to store user data across multiple pages
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

    // Sanitize and escape user input to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    // Additional information related to payment
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment-method']);

    // Retrieve user ID from session data
    $userId = $_SESSION["user_id"];

    // Store shipping and payment data in session variables
    $_SESSION['shipping_data'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'country' => $country,
        'state' => $state,
        'city' => $city,
        'address' => $address,
        'code' => $code
    ];

    $_SESSION['payment_data'] = [
        'payment_method' => $paymentMethod
    ];

    // Redirect to the next checkout step
    header("Location: /FashionFlix-Website/checkout-2.php");
    exit();
}

// Close the database connection
mysqli_close($conn);

?>