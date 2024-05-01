<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Privacy Policy</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodyprivacypolicy.css">
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
            <!-- Section for displaying the Privacy Policy -->
            <section class="privacy-body">
                <!-- Breadcrumb navigation indicating Home and Privacy Policy -->
                <div class="from-tab-privacy">
                    <a href="index.php">Home</a><span>> Privacy Policy</span>
                </div>
                <!-- Header for the Privacy Policy section -->
                <div class="privacy-head">
                    <h1>Privacy Policy</h1>
                </div>
                <!-- Paragraphs providing information about the Privacy Policy -->
                <div class="privacy-para">
                    <p>FashionFlix is committed to ensuring that your personal information is used properly and is kept securely. This Privacy Policy explains how we will collect and use your personal information through a website [www.fashionflix.pk]. Please read our Privacy Policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your personal information. We will not sell or redistribute your information to anyone.</p><br>
                    <p id="bold">What personal information do we collect from the people that visit our website?</p><br>
                    <p>When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, contact number, mailing address, credit card information or other details to help you with your experience.</p><br>
                    <p id="bold">When do we collect information?</p><br>
                    <p>We collect information from you when you register on our site, place an order, subscribe to updates, leave a message on Customer Service, or enter information on our site.</p><br>
                    <p id="bold">Use and storage of your personal information</p><br>
                    <p>We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:</p><br>
                    <ul>
                        <li>To be able to contact you in the event of any problem with the delivery of your items.</li>
                        <li>To process orders and to send information and updates pertaining to orders.</li>
                        <li>To be able to send text message notifications of delivery status.</li>
                        <li>To personalize your experience and to allow us to deliver the type of content and product offerings in which you are most interested.</li>
                        <li>To allow us to better service you in responding to your customer service requests.</li>
                        <li>To quickly process your transactions.</li>
                        <li>To ask for ratings and reviews of services or products.</li>
                    </ul>
                    <br>
                    <p>We will only keep your information for as long as necessary to carry out our services to you or for as long as we are required by law. After this your personal information will be deleted. Rest assured, your personal information is protected by an additional security layer called SSL which ensures your sensitive information is transmitted securely through an encrypted link.</p><br>
                    <h3>Cookies</h3><br>
                    <p>We also use non-personal data such as third-party cookies to collect statistics to enhance and simplify your visit. A cookie is a piece of information that is held on the hard drive of your computer which records how you have used a website. Cookies make it easier for you to log on and use the Website during future visits.</p><br>
                    <p>The permanent cookies are stored on your computer or mobile device for no longer than 24 months. You can easily erase cookies from your computer or mobile device using your browser.</p><br>
                    <h3>Your Rights</h3><br>
                    <p>You have the right to request information about the personal data we hold on you. If your data is incorrect, incomplete or irrelevant, you can ask to have the information corrected or removed.</p>
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
    </body>
</html>