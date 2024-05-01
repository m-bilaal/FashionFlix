<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Sign Up</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodysignup.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/footer.css">
        <!-- Font Awesome stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php include("Backend/backend-signup.php") ?>
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
            <!-- Section for user signup -->
            <section class="signup-back">
                <!-- Breadcrumb navigation indicating Home and Sign Up -->
                <div class="from-tab-signup">
                    <a href="index.php">Home</a><span>> Sign Up</span>
                </div>
                <!-- Container for signup image and form -->
                <div class="signup-image">
                    <!-- Form for user signup with PHP server-side validation -->
                    <div class="signup-form">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Input fields for user's name, email, and password -->
                            <div>
                                <input id="signup-name" type="text" name="name" required>
                                <label id="label-name" for="name">Name</label>
                                <!-- Error handling and validation message for name -->
                                <div><span id="name-error" class="error"></span></div>
                                <span class="error"><?php echo $nameError; ?></span>
                            </div>
                            <div class="break-1"></div>
                            <div>
                                <input id="signup-email" type="text" name="email" required>
                                <label id="label-email" for="email">Email</label>
                                <!-- Error handling and validation message for email -->
                                <div><span id="email-error" class="error"></span></div>
                                <span class="error"><?php echo $emailError; ?></span>
                            </div>
                            <div class="break-2"></div>
                            <div>
                                <input id="signup-password" type="password" name="password" required>
                                <label id="label-password" for="password">Password</label>
                                <!-- Error handling and validation message for password -->
                                <div><span id="password-error" class="error"></span></div>
                                <span class="error"><?php echo $passwordError; ?></span>
                            </div>
                            <div class="break-3"></div>
                            <!-- Button for submitting the signup form with client-side validation -->
                            <button id="signup-button" type="submit" onclick="return validateForm()">Sign Up</button>
                            <div class="break-4"></div>
                            <hr id="line">
                            <div class="break-5"></div>
                            <!-- Link to login page for users with existing accounts -->
                            <p id="new">Already have an account? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
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
        <script src="/FashionFlix-Website/JavaScript/signup.js"></script>
    </body>
</html>