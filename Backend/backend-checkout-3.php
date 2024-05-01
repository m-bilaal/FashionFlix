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

    // Sanitize and escape billing information from the form
    $b_name = mysqli_real_escape_string($conn, $_POST['b_name']);
    $b_email = mysqli_real_escape_string($conn, $_POST['b_email']);
    $b_phone = mysqli_real_escape_string($conn, $_POST['b_phone']);
    $b_country = mysqli_real_escape_string($conn, $_POST['b_country']);
    $b_state = mysqli_real_escape_string($conn, $_POST['b_state']);
    $b_city = mysqli_real_escape_string($conn, $_POST['b_city']);
    $b_address = mysqli_real_escape_string($conn, $_POST['b_address']);
    $b_code = mysqli_real_escape_string($conn, $_POST['b_code']);

    // Sanitize and escape credit card information from the form
    $cardname = mysqli_real_escape_string($conn, $_POST['cardname']);
    $cardnumber = mysqli_real_escape_string($conn, $_POST['cardnumber']);
    $month = mysqli_real_escape_string($conn, $_POST['month']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $cvc = mysqli_real_escape_string($conn, $_POST['cvc']);

    // Retrieve user ID from session data
    $userId = $_SESSION["user_id"];

    // SQL query to update shipping details with billing and card information
    $sql = "UPDATE shipping 
            SET B_Name = '$b_name', B_Email = '$b_email', B_Phone = '$b_phone', 
                B_Country = '$b_country', B_State = '$b_state', B_City = '$b_city', 
                B_Address = '$b_address', B_Code = '$b_code', 
                CardName = '$cardname', CardNumber = '$cardnumber', 
                Month = '$month', Year = '$year', CVC = '$cvc' 
            WHERE UserID = '$userId'";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
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