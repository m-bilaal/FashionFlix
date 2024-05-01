<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $comment = $_POST["comment"];

    // SQL query to insert contact form data into the 'contact' table
    $sql = "INSERT INTO contact (Name, Email, Phone, Comment) VALUES ('$name', '$email', '$phone', '$comment')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Set a success message in the session if the query is successful
        $_SESSION["success_message"] = "<i class='fa-solid fa-circle-check'></i> Thanks for contacting us. We'll get back to you as soon as possible.";
    } else {
        // Set an error message in the session if the query fails
        $_SESSION["error_message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect to the contact.php page
    header("Location: contact.php");
    exit();
}

?>