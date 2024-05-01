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

// User ID to be updated
$user_id = 27;

// SQL query to update the 'is_admin' field for the specified user
$sql = "UPDATE registered_users SET is_admin = 1 WHERE UserID = $user_id";

// Execute the update query
if ($conn->query($sql) === TRUE) {
    // If the update is successful, no need to output anything
    echo "";
} else {
    // If there is an error in the update, output an error message
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();

?>