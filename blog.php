<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags for character set and viewport -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Page title -->
        <title>Blog</title>
        <!-- Favicon -->
        <link rel="icon" href="/FashionFlix-Website/Photos/icon.png">
        <!-- External stylesheets -->
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/universal.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/header.css">
        <link rel="stylesheet" href="/FashionFlix-Website/CSS/bodyblog.css">
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
            <!-- Blog content section -->
            <section class="blog-content">
                <!-- Breadcrumb navigation indicating Home and Blog -->
                <div class="from-tab-blog">
                    <a href="index.php">Home</a><span>> Blog</span>
                </div>
                <!-- Section heading for Our Blogs -->
                <div class="blog-head">
                    <h1>Our Blogs</h1>
                </div>
                <!-- Individual blog entries with images and content -->
                <div class="blog-1">
                    <div class="blog-image-1">
                    <img src="/FashionFlix-Website/Photos/blog-1.jpg" alt="Unstitched-Printed">
                    </div>
                    <div class="blog-content-in-1">
                    <div class="blog-content-1">
                    <h4>Unstitched Elegance: Embrace the Beauty of Printed Women's Wear</h4><br>
                    <p>In the world of fashion, there's a certain allure in the freedom to craft your style, and unstitched printed fabrics epitomize this freedom. At FashionFlix, we celebrate the charm and versatility of unstitched printed women's clothing, offering you a canvas to create your personalized fashion statement.</p><br>
                    <p>Unstitched garments grant you the power to sculpt your outfit according to your preferences. Dive into our wide array of unstitched fabrics adorned with captivating prints that weave stories of tradition, contemporary trends, and artistic finesse.</p><br>
                    <p>From vibrant florals to intricate geometric patterns and culturally inspired motifs, our collection boasts an eclectic mix of prints. Each design tells a unique story, inviting you to embrace the rich tapestry of cultures and styles.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-2">
                    <div class="blog-image-2">
                    <img src="/FashionFlix-Website/Photos/blog-2.jpg" alt="Unstitched-Embroidered">
                    </div>
                    <div class="blog-content-in-2">
                    <div class="blog-content-1">
                    <h4>The Artistry Unveiled: Unstitched Embroidered Women's Apparel</h4><br>
                    <p>At FashionFlix, every thread weaves a tale of craftsmanship and elegance. Our collection of unstitched embroidered women's clothing embodies the beauty of intricate artistry and empowers you to create bespoke ensembles that reflect your individual style.</p><br>
                    <p>Embroidery isn't just needle and thread—it's a labor of love. Dive into our exquisite assortment of unstitched fabrics adorned with meticulously crafted embroidery. From delicate floral motifs to ornate patterns, each piece is a testament to the skilled hands that weave magic.</p><br>
                    <p>Unstitched garments offer you the freedom to shape your outfit according to your vision. Explore our diverse range of unstitched fabrics adorned with breathtaking embroidery. Whether you prefer traditional elegance or contemporary chic, our collection caters to every style inclination.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-9">
                    <div class="blog-image-9">
                    <img src="/FashionFlix-Website/Photos/blog-9.jpg" alt="Unstitched-Embellished">
                    </div>
                    <div class="blog-content-in-9">
                    <div class="blog-content-9">
                    <h4>Elegance Unveiled: The Timeless Charm of Unstitched Embellished Dresses</h4><br>
                    <p>In the world of fashion, where trends come and go, there's something inherently timeless about unstitched embellished dresses. At FashionFlix, we take pride in curating a collection that captures the essence of sophistication, allowing you to embrace the artistry of unstitched embellished dresses.</p><br>
                    <p>Shopping for an unstitched embellished dress at FashionFlix is not just a transaction; it's a creative journey. We invite you to explore the world of unstitched embellished dresses—a realm where tradition meets modernity, and individuality takes center stage.</p><br>
                    <p>Our collection at FashionFlix offers a myriad of possibilities for those who appreciate the beauty of unstitched embellished dresses. Dive into a world of lush fabrics, vibrant color palettes, and exquisite embellishments that cater to diverse tastes.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-3">
                    <div class="blog-image-3">
                    <img src="/FashionFlix-Website/Photos/blog-3.jpg" alt="Readymade-Printed">
                    </div>
                    <div class="blog-content-in-3">
                    <div class="blog-content-3">
                    <h4>Effortless Elegance: The Allure of Readymade Printed Apparel</h4><br>
                    <p>At FashionFlix, we believe in making fashion effortless yet stunning. Dive into our collection of readymade printed women's clothing, where vibrant designs and comfort converge to redefine your everyday style.</p><br>
                    <p>In a fast-paced world, convenience matters. Our readymade printed collection offers the perfect solution. Simply pick your style, slip into the outfit, and effortlessly embrace elegance. It's fashion at your fingertips!</p><br>
                    <p>Prints add personality to any outfit. Explore our curated selection of readymade clothing adorned with captivating prints—ranging from bold florals to intricate geometric designs and playful motifs. Each piece is a nod to individuality and expression.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-4">
                    <div class="blog-image-4">
                    <img src="/FashionFlix-Website/Photos/blog-4.jpg" alt="Readymade-Embroidered">
                    </div>
                    <div class="blog-content-in-4">
                    <div class="blog-content-4">
                    <h4>Elegance Redefined: Discover the Charms of Readymade Embroidered Apparel</h4><br>
                    <p>Step into a world of grace and sophistication with FashionFlix's exquisite collection of readymade embroidered women's clothing. Each piece is a testament to artistry, where intricate embroidery meets effortless style.</p><br>
                    <p>In a world where time is precious, our readymade embroidered collection offers an instant style upgrade. Simply slip into these intricately embellished pieces and exude elegance effortlessly.</p><br>
                    <p>Embroidery isn't just a design—it's a labor of love. Explore our curated selection of readymade clothing adorned with stunning embroidery. From delicate floral patterns to ornate motifs, every stitch narrates a tale of craftsmanship.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-5">
                    <div class="blog-image-5">
                    <img src="/FashionFlix-Website/Photos/blog-5.jpg" alt="Readymade-Embellished">
                    </div>
                    <div class="blog-content-in-5">
                    <div class="blog-content-5">
                    <h4>Radiate Glamour: The Allure of Readymade Embellished Women's Attire</h4><br>
                    <p>At FashionFlix, we believe in the power of embellishments to elevate style to new heights. Step into our world of glamour with our collection of readymade embellished women's clothing, where every piece tells a story of opulence and sophistication.</p><br>
                    <p>Embellishments add a touch of allure to any outfit. Explore our curated selection of readymade attire adorned with exquisite embellishments—be it intricate beadwork, dazzling sequins, or delicate lace details. Each piece exudes elegance and sophistication.</p><br>
                    <p>In a world where time is of the essence, our readymade embellished collection offers instant glamour. Slip into these intricately adorned pieces and radiate confidence effortlessly. Our collection caters to diverse occasions and tastes.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-6">
                    <div class="blog-image-6">
                    <img src="/FashionFlix-Website/Photos/blog-6.jpg" alt="Readymade-Dyed">
                    </div>
                    <div class="blog-content-in-6">
                    <div class="blog-content-6">
                    <h4>Chromatic Elegance: Exploring Readymade Dyed Women's Attire</h4><br>
                    <p>At FashionFlix, fashion meets the vibrancy of colors. Dive into our collection of readymade dyed women's clothing, where every hue signifies a story, and each piece embodies effortless elegance.</p><br>
                    <p>Dyeing isn't just about colors—it's an art form. Explore our curated selection of readymade attire adorned with a spectrum of hues—rich, vibrant tones to soft, pastel shades. Each piece reflects the beauty and versatility of dyed fabrics.</p><br>
                    <p>In a world where expression matters, our readymade dyed collection offers instant chic. Slip into these beautifully dyed pieces and radiate confidence effortlessly. Our collection caters to various styles and occasions. Whether it's a relaxed day out or a formal gathering, our readymade dyed attire seamlessly adapts, allowing you to express yourself from casual comfort to striking elegance.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-8">
                    <div class="blog-image-8">
                    <img src="/FashionFlix-Website/Photos/blog-8.jpg" alt="Western">
                    </div>
                    <div class="blog-content-in-8">
                    <div class="blog-content-8">
                    <h4>Modern Glamour: Embracing Timeless Trends with Our Exquisite Western Dresses</h4><br>
                    <p>In the ever-evolving landscape of fashion, the allure of Western dresses remains unwavering. At FashionFlix, we invite you to explore a curated collection that encapsulates the essence of contemporary style, blending sophistication and comfort seamlessly.</p><br>
                    <p>Western dresses are celebrated for their versatility and the elegant silhouettes they bring to the fashion landscape. From chic A-line dresses that flatter every figure to sleek bodycon styles that exude confidence, our collection encompasses a spectrum of designs to suit varied tastes.</p><br>
                    <p>Explore the playfulness of floral prints for a day at the park, opt for a classic little black dress for an evening soiree, or make a bold statement with contemporary patterns and textures.</p>
                    </div>
                    </div>
                </div>
                <div class="blog-7">
                    <div class="blog-image-7">
                    <img src="/FashionFlix-Website/Photos/blog-7.jpg" alt="Abaya">
                    </div>
                    <div class="blog-content-in-7">
                    <div class="blog-content-7">
                    <h4>Abayas: Celebrating Elegance, Modesty, and Style</h4><br>
                    <p>At FashionFlix, we embrace the timeless allure of the abaya, a garment that transcends fashion, embodying grace, modesty, and sophistication. Join us as we explore the significance and versatility of this traditional attire.</p><br>
                    <p>The abaya is more than just clothing; it's a symbol of cultural heritage and refinement. Discover our collection of abayas, each crafted with meticulous attention to detail, celebrating the artistry and elegance of this iconic garment.</p><br>
                    <p>In a world where fashion evolves, the abaya stands as a testament to modest fashion. Our collection boasts a range of styles, from classic designs to modern interpretations, offering versatility while preserving the essence of modesty.</p>
                    </div>
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
    </body>
</html>