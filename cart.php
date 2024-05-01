<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Cart</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodycart.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/footer.css">
        <!-- Font Awesome stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php session_start(); ?>
        <?php include("Backend/backend-cart.php"); ?>
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
        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Wait for the document to be ready
            $(document).ready(function() {
                // Handle form submission for updating cart items
                $('.update-form').submit(function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Get the form and relevant data
                    var form = $(this);
                    var cartId = form.data('cartid');
                    var quantity = form.find('.quantity-num').val();

                    // Make an AJAX request to update the cart
                    $.ajax({
                        type: 'POST',
                        url: 'Backend/backend-updatecart.php',
                        data: { cart_id: cartId, quantity: quantity },
                        success: function(response) {
                            // Update the total price on the page after a successful update
                            var totalPrice = 0;
                            $('.item-price').each(function() {
                                totalPrice += parseFloat($(this).text());
                            });
                            $('#total-price').text(totalPrice);
                        },
                        error: function(xhr, status, error) {
                            // Log any errors to the console
                            console.error(xhr.responseText);
                        }
                    });
                });

                // Handle checkout button click
                $('#checkout').click(function() {
                    // Add any checkout-related functionality here
                });
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
            <!-- Section for displaying the contents of the shopping cart -->
            <section class="cart-body" id="cart-body">
                <!-- Breadcrumb navigation indicating Home and Cart -->
                <div class="from-tab-cart">
                    <a href="index.php">Home</a><span>> Cart</span>
                </div>  
                <!-- Header for the shopping cart section -->
                <div class="cart-head">
                    <h1>Your Cart</h1>
                </div>
                <?php
                    // Initialize total price variable
                    $totalPrice = 0;

                    // Check if the cart has items
                    if (!empty($cartItems)) {
                        // Loop through each item in the cart
                        foreach ($cartItems as $item) {
                            // Calculate the individual item price
                            $itemPrice = $item['price'] * $item['quantity'];
                            
                            // Update the total price
                            $totalPrice += $itemPrice;

                            // Display each cart item in a table
                            echo '<div class="cart-items-table">';
                            echo '<table class="cart-table">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Image</th>';
                            echo '<th>Product</th>';
                            echo '<th>Quantity</th>';
                            echo '<th>Update</th>';
                            echo '<th>Remove</th>';
                            echo '<th>Price</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            echo '<tr class="cart-item-row">';
                            echo '<td class="cart-item-image"><img src="' . $item['product_image'] . '" alt="Product"></td>';
                            echo '<td class="cart-item-name">' . $item['product_name'] . '</td>';
                            echo '<td class="cart-item-quantity">';
                            echo '<form method="POST" action="Backend/backend-updatecart.php">';
                            echo '<input type="hidden" name="cart_id" value="' . $item['cart_id'] . '">';
                            echo '<input type="number" id="quantity-num" name="quantity" value="' . $item['quantity'] . '" min="1">';
                            echo '<button type="submit" id="update">Update<button>';
                            echo '</form>';
                            echo '</td>';
                            echo '<td class="cart-item-update">';
                            echo '<form method="POST" action="Backend/backend-removecart.php">';
                            echo '<input type="hidden" name="cart_id" value="' . $item['cart_id'] . '">';
                            echo '<button type="submit" id="remove">Remove</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '<td class="cart-item-price"><span>Rs. ' . $item['price'] . '</span></td>';
                            echo '</tr>';
                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';
                        }

                        // Display total price and checkout button
                        echo '<div class="total-price-row">';
                        echo '<p class="total-price-label">Total Price:</p>';
                        echo '<p class="total-price-value">Rs. ' . $totalPrice . '</p>';
                        echo '</div>';
                        echo '<div class="checkout">';
                        echo '<a href="checkout-1.php"><button id="checkout">Checkout</button></a>';
                        echo '</div>';
                    } else {
                        // Display messages and options when the cart is empty
                        echo '<div class="space-1"></div>';
                        echo '<div class="cart-subhead">';
                        echo '<h2>Your FashionFlix Cart is Empty</h2>';
                        echo '</div>';
                        echo '<div class="cart-continue">';
                        echo '<a href="shop.php"><button type="button">Continue Shopping</button></a>';
                        echo '</div>';
                        echo '<div class="cart-account">';
                        echo '<h3>Have an account?</h3>';
                        echo '</div>';
                        echo '<div class="cart-login">';
                        echo '<p><a href="login.php"><span>Login</span></a> to check out faster.</p>';
                        echo '</div>';
                        echo '<div class="space-2"></div>';
                    }
                ?>
            </section>
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
    </body>
</html>