<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_flix";

try {
    // Create a new PDO instance for database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the keyword parameter from the GET request or set it to an empty string
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    // Check if the keyword is not empty
    if (!empty($keyword)) {
        // Prepare a SQL statement to select products based on the keyword
        $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE :keyword LIMIT 10");

        // Bind the keyword parameter to the prepared statement
        $stmt->bindValue(':keyword', '%' . $keyword . '%');

        // Execute the prepared statement
        $stmt->execute();

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Initialize arrays to store unique results and product names
        $uniqueResults = [];
        $productNames = [];

        // Iterate through the results
        foreach ($results as $product) {
            $productName = $product['product_name'];

            // Check if the product name is not already in the list
            if (!in_array($productName, $productNames)) {
                // Add the product to the unique results
                $uniqueResults[] = $product;
                
                // Add the product name to the list of product names
                $productNames[] = $productName;
            }
        }

        // Encode the unique results as JSON and echo the response
        echo json_encode($uniqueResults);
    } else {
        // If the keyword is empty, echo an empty JSON array
        echo json_encode([]);
    }
} catch (PDOException $e) {
    // Handle exceptions related to database connection
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;

?>