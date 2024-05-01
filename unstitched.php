<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Unstitched</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/headershopextra.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodyunstitched.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/footer.css">
        <!-- Font Awesome stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php session_start(); ?>
        <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "fashion_flix";
            
            // Establishing database connection
            $conn = mysqli_connect($servername, $username, $password, $dbname, "3306");
            
            // Checking if the connection is successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        ?>
        <script>
            // JavaScript to display an alert if a product is added to the cart
            document.addEventListener("DOMContentLoaded", function() {
                if (<?php echo isset($_SESSION['productAddedToCart']) ? 'true' : 'false'; ?>) {
                    alert('The product has been added to your cart successfully. You can change the quantity of the product in your cart.');
                    <?php unset($_SESSION['productAddedToCart']); ?>
                }
            });
        </script>
        <!-- Header section -->
        <header>
            <div class="nav-bar">
                <!-- Logo -->
                <div class="nav-logo">
                    <a href="index.php"><img src="/FashionFlix-Website/Photos/logo.png" alt="FashionFlix"></a>
                </div>
                <!-- Search bar -->
                <div class="nav-search">
                    <div class="search-bar">
                        <input placeholder="Search FashionFlix" id="searchBar">
                        <div class="suggestions-container" id="suggestionsContainer"></div>
                    </div>
                    <div class="search-icon">
                        <a href="#search"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <ul class="nav-buttons">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
                <!-- User information -->
                <ul class="user-info">
                    <?php
                    // Displaying user information or login/signup links
                    if (isset($_SESSION["username"])) {
                        // Displaying user information if logged in
                        echo '<li><span>' . $_SESSION["username"] . '</span></li>';
                        echo '<li>|</li>';
                        echo '<li><a href="myprofile.php">My Profile</a></li>';
                        echo '<li>|</li>';
                        if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
                            // Displaying admin links if the user is an admin
                            echo '<li><a href="upload.php">Upload</a></li>';
                            echo '<li>|</li>';
                            echo '<li><a href="delete.php">Delete</a></li>';
                            echo '<li>|</li>';
                        }
                        echo '<li><a href="Backend/backend-signout.php">Sign Out</a></li>';
                    } else {
                        // Displaying login/signup links if not logged in
                        echo '<a href="login.php"><i class="fa-regular fa-user"></i></a>';
                        echo '<li><a href="login.php">Login</a></li>';
                        echo '<li>|</li>';
                        echo '<li><a href="signup.php">Sign Up</a></li>';
                    }
                    ?>
                </ul>
            </div> 
        </header>
        <!-- Main section -->
        <main>
            <!-- Section for displaying Unstitched items -->
            <section class="unstitched-back">
                <!-- Breadcrumb navigation indicating Home, Shop, and Unstitched -->
                <div class="from-tab-unstitched">
                    <a href="index.php">Home</a><span>></span><a href="shop.php">Shop</a><span>> Unstitched</span>
                </div>
                <!-- Placeholder for Unstitched images -->
                <div class="unstitched-image">
                    <!-- Adding image or banner content here -->
                </div>
            </section>
            <!-- Section for displaying all items -->
            <section class="all-items">
            <div class="items-1">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [17, 18, 19, 20];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-2">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [21, 22, 23, 24];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-3">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [57, 58, 59, 60];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-4">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [61, 62, 63, 64];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-5">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [65, 66, 67, 68];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-6">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [69, 70, 71, 72];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-7">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [73, 74, 75, 76];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-8">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [77, 78, 79, 80];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-9">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [81, 82, 83, 84];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-10">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [85, 86, 87, 88];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
            </section>
            <section class="items-11-to-20">
            <div class="items-1">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [17, 18, 19, 20];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-2">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [21, 22, 23, 24];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-3">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [57, 58, 59, 60];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-4">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [61, 62, 63, 64];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-5">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [65, 66, 67, 68];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-6">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [69, 70, 71, 72];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-7">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [73, 74, 75, 76];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-8">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [77, 78, 79, 80];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-10">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [85, 86, 87, 88];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
                <div class="items-9">
                <?php

                    // PHP code to fetch and display specific products
                    $specificProductIDs = [81, 82, 83, 84];

                    $productIDs = implode(',', $specificProductIDs);
                    $sql = "SELECT * FROM product WHERE product_id IN ($productIDs)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // Using a loop to display product information
                        while ($row = $result->fetch_assoc()) {

                            echo '<a href="#coll">';
                            echo '<div>';
                            echo '<img src="' . $row['product_image'] . '" alt="Product">';
                            echo '<h6>' . $row['product_name'] . '</h6>';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<form method="POST" action="Backend/backend-addtocart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<button type="submit" id="addtocart">Add to Cart</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No products found";
                    }

                ?>
                </div>
            </section>
                <div class="more-4">
                    <button id="showMoreBtn">Show More</button>
                </div>
        </main>
        <!-- Footer section -->
        <footer>
            <!-- Newsletter section -->
            <div class="newsletter">
                <div class="news-text">
                    <h3>JOIN OUR NEWSLETTER</h3><br>
                    <p>Subscribe to our newsletter to get latest updates.</p>
                </div>
                <div class="news-email">
                    <!-- Input for email subscription -->
                    <input placeholder="Enter Your Email Address">
                    <a href="#subscribe"><button>Subscribe</button></a>
                </div>
            </div>
            <!-- Footer content -->
            <div class="foot">
                <!-- About section -->
                <div class="about">
                    <h4>ABOUT</h4><br>
                    <!-- Various links under About section -->
                    <p><a href="about.php">About Us</a></p><br>
                    <p><a href="blog.php">Blog</a></p><br>
                    <p><a href="#store">Store Locator</a></p><br>
                    <p><a href="termsandconditions.php">Terms and Conditions</a></p><br>
                    <p><a href="privacypolicy.php">Privacy Policy</a></p><br>
                    <p><a href="contact.php">Contact Us</a></p>
                </div>
                <!-- Customer Care section -->
                <div class="care">
                    <h4>CUSTOMER CARE</h4><br>
                    <!-- Various links under Customer Care section -->
                    <p><a href="shippingpolicy.php">Shipping Policy</a></p><br>
                    <p><a href="trackyourorder.php">Track Your Order</a></p><br>
                    <p><a href="ordercancellationpolicy.php">Order Cancellation Policy</a></p><br>
                    <p><a href="returnandexchangepolicy.php">Return and Exchange Policy</a></p><br>
                    <p><a href="helpcenter.php">Help Center</a></p>
                </div>
                <!-- Follow Us section -->
                <div class="follow">
                    <h4>FOLLOW US</h4><br>
                    <!-- Social media icons -->
                    <a href="#facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#youtube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#twitter"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <!-- Payment Methods section -->
                <div class="payment">
                    <h4>PAYMENT METHODS</h4><br>
                    <!-- Payment icons -->
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-apple-pay"></i>
                    <i class="fa-brands fa-google-pay"></i>
                </div>
            </div>
            <!-- Copyright text -->
            <div class="copyright">
                <p>Copyright &copy; 2023 FashionFlix. All rights reserved.</p>
            </div>
        </footer>
        <!-- External JavaScript files -->
        <script src="/FashionFlix-Website/JavaScript/header.js"></script>
        <script src="/FashionFlix-Website/JavaScript/search.js"></script>
        <script src="/FashionFlix-Website/JavaScript/footer.js"></script>
        <script src="/FashionFlix-Website/JavaScript/unstitched.js"></script>
    </body>
</html>