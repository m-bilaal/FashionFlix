<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

try {
    // Create a new PDO connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set PDO attributes to handle errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the search keyword from the GET request, if available
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    // Check if the keyword is not empty
    if (!empty($keyword)) {
        // Prepare a SQL query to select distinct records from the 'product' table based on the keyword
        $stmt = $conn->prepare("SELECT DISTINCT * FROM product WHERE product_name LIKE :keyword");
        
        // Bind the keyword parameter with wildcard characters for a partial match
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        
        // Execute the prepared statement
        $stmt->execute();

        // Fetch the results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Encode the results as JSON and output to the client
        echo json_encode($results);
    } else {
        // If the keyword is empty, output an empty JSON array
        echo json_encode([]);
    }
} catch(PDOException $e) {
    // If a PDO exception occurs, output an error message
    echo "Connection failed: " . $e->getMessage();
}

// Close the PDO connection
$conn = null;

?>