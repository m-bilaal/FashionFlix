<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Help Center</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodyhelpcenter.css">
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
            <!-- Section for the help center -->
            <section class="help-body">
                <!-- Breadcrumb navigation indicating Home and Help Center -->
                <div class="from-tab-help">
                    <a href="index.php">Home</a><span>> Help Center</span>
                </div>
                <!-- Section heading for Help Center -->
                <div class="help-head">
                    <h1>Help Center</h1>
                </div>
                <!-- Frequently Asked Questions (FAQs) organized by category -->
                <div class="help-para">
                    <!-- FAQ section for My Account -->
                    <h3>My Account</h3><br>
                    <ol class="faq-list">
                        <li class="faq-item">Do I need to have an account to shop with you?<br>
                            <div class="faq-answer">
                                <p>Ans : You can shop from our online store without creating an account and can place an order with guest checkout. However, creating an account will make your shopping process easier.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">How do I create an account?<br>
                            <div class="faq-answer">
                                <p>Ans : Click on 'Create an Account' mentioned on our homepage, you will be promoted to a page on which you will be required to fill out personal details in order create your account.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">How can I change my shipping address?<br>
                            <div class="faq-answer">
                                <p>Ans : Yes, you can edit or add a new shipping address by logging in to your account. Please sign in and click on 'My Account'. You will be able to edit/update your details in your account and save them for future orders. In case your order is confirmed and you wish to change the delivery address, please contact our customer service immediately. The requested change will be carried out in case the order is not processed.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">What if I forget my password?<br>
                            <div class="faq-answer">
                                <p>Ans : Click on 'Forgot Your Password' available at the login/sign-up page. Enter your email address and click on 'Reset Password'. A set of instructions will be sent to your registered email ID to re-set your password. After your credentials have been verified, you will be able to create a new password.</p>
                            </div>
                        </li>
                    </ol><br>
                    <!-- FAQ section for Order -->
                    <h3>Order</h3><br>
                    <ol class="faq-list">
                        <li class="faq-item">How do I place an order?<br>
                            <div class="faq-answer">
                                <p>Ans : Following are the steps to place an order successfully:</p><br>
                                <ul>
                                    <li>When browsing through our web, you can enter the quantity in the tab provided next to the product you wish to buy and click 'add to cart'. You can add as many items as you wish to buy.</li>
                                    <li>After you have finished browsing and click on 'proceed to checkout' you will be promoted to a page on which you shall pick a payment method (different payment methods are available as addressed in FAQs below).</li>
                                    <li>You will receive an email/SMS of sales invoice which verifies that we have received your order.</li>
                                    <li>Your order will be confirmed via phone call by our Customer Service and proceeded for delivery.</li>
                                </ul>
                            </div>
                        </li><br>
                        <li class="faq-item">How long will my order take to arrive?<br>
                            <div class="faq-answer">
                                <p>Ans : You will be provided with a tracking ID in order to keep a track of your order. Domestic orders normally take 3-4 days to arrive; whereas, international orders normally take 7-8 days.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Can I cancel my order?<br>
                            <div class="faq-answer">
                                <p>Ans : Your order cannot be cancelled once you check out. However, you can cancel the order when you receive a verification call from our Customer Service. <a href="returnandexchangepolicy.php" id="link">Exchange Policy</a> shall apply once the order has been placed.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Do you take orders over phone call or WhatsApp?<br>
                            <div class="faq-answer">
                                <p>Ans : Yes, you can place your order on WhatsApp or phone call on our number 0318-5544179. Please ensure to provide the article number, color and size of the product you wish to purchase.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">What does it mean if I don't receive a sales invoice via email/SMS after I check-out?<br>
                            <div class="faq-answer">
                                <p>Ans : If you haven't received a sales invoice via email within an hour it means your order hasn't been successfully placed.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">How will I know the status of my order?<br>
                            <div class="faq-answer">
                                <p>Ans : You can contact our customer service to know the status of your order. Helpline/WhatsApp: 0318-5544179.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">What is the difference between order ID and tracking ID?<br>
                            <div class="faq-answer">
                                <p>Ans : Order ID will be issued at the time you place an order, it is a unique number assigned to your transaction. Tracking ID will be issued at the time your order is dispatched, this ID will be used to track your order and the status of delivery. For domestic orders, you can track your order here <a href="trackyourorder.php" id="link">Track Your Order</a>.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">How many times does the courier service agent attempt to deliver my order?<br>
                            <div class="faq-answer">
                                <p>Ans : You will be contacted by the courier service agent 8 hours before the delivery time, if you fail to receive your order on your doorstep, the agent will attempt to contact you again. Your order will be automatically cancelled if you fail to receive the order the second time as well.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Can I add more items to my existing order?<br>
                            <div class="faq-answer">
                                <p>Ans : You will have to place a new order and cannot add more items to the order that has been processed. You can edit your order before the order is dispatched by using your Order ID, please contact our customer service immediately.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Does adding an item to the cart means that the item is reserved?<br>
                            <div class="faq-answer">
                                <p>Ans : Just adding the product in the cart does not mean the product is reserved. The product is not yours until you pay for it and place an order.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">What is the difference between 'add to wishlist' and 'add to cart'?<br>
                            <div class="faq-answer">
                                <p>Ans : "Add to wishlist" means you like the product and may consider buying it sometime later but not right now; whereas, when you add a product to the cart, it means that you are serious about buying the product and that you are just a few steps away from making the payment.</p>
                            </div>
                        </li>
                    </ol><br>
                    <!-- FAQ section for Payment -->
                    <h3>Payment</h3><br>
                    <ol class="faq-list">
                        <li class="faq-item">What payment options are available?<br>
                            <div class="faq-answer">
                                <p>Ans : Following are the payment options available to shop at our online store:</p>
                                <ul>
                                    <li>Cash on Delivery (For domestic clients only).</li>
                                    <li>Online payment.</li>
                                </ul>
                            </div>
                        </li><br>
                        <li class="faq-item">What happens if my payment fails?<br>
                            <div class="faq-answer">
                                <p>Ans : The order will only be processed once the payment has been received in our account. If you're unable to make the online payment, please contact our customer service.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">What does Cash on Delivery mean?<br>
                            <div class="faq-answer">
                                <p>Ans : If you choose Cash on Delivery as a payment method on the checkout page, it means you'll be asked for the required amount in cash at the time of the delivery and will be provided with a receipt along with your purchase.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Is Cash on Delivery service offered to international clients?<br>
                            <div class="faq-answer">
                                <p>Ans : No. It is a service offered only to domestic clients.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Can I get a refund?<br>
                            <div class="faq-answer">
                                <p>Ans : No, FashionFlix strictly follows 'No refund' policy. Kindly, read our <a href="returnandexchangepolicy.php" id="link">Exchange Policy</a> for further details.</p>
                            </div>
                        </li>
                    </ol><br>
                    <!-- FAQ section for Delivery -->
                    <h3>Delivery</h3><br>
                    <ol class="faq-list">
                        <li class="faq-item">Do you ship internationally?<br>
                            <div class="faq-answer">
                                <p>Ans : Yes, we ship internationally!</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Are the prices inclusive of delivery charges?<br>
                            <div class="faq-answer">
                                <p>Ans : No. The prices are exclusive of delivery and shipping charges.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">How are the delivery charges calculated for international orders?<br>
                            <div class="faq-answer">
                                <p>Ans : Delivery charges for international orders vary according to the weight of parcel and the region of delivery.</p>
                            </div>
                        </li>
                    </ol><br>
                    <!-- FAQ section for Security -->
                    <h3>Security</h3><br>
                    <ol class="faq-list">
                        <li class="faq-item">Is it safe to pay with credit/debit card?<br>
                            <div class="faq-answer">
                                <p>Ans : Yes. All payment information submitted by our customers is kept confidential. All Credit Card and Debit Card payments are processed over a secure encrypted connection, with the highest level of security and confidentiality. Only authorized personnel have the right to access this information.</p>
                            </div>
                        </li><br>
                        <li class="faq-item">Is my personal information safe?<br>
                            <div class="faq-answer">
                                <p>Ans : Yes, your personal information is absolutely safe, please read our <a href="privacypolicy.php" id="link">Privacy Policy</a>.</p>
                            </div>
                        </li>
                    </ol>
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
        <script src="/FashionFlix-Website/JavaScript/helpcenter.js"></script>
    </body>
</html>