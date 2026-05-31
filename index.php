<?php
session_start();

include("includes/connect.php");

if ($conn->connect_error) {
  error_log("Connection failed: " . $conn->connect_error);
  die("Unable to connect to the database.");
} else {


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Vault | Home</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> <!-- For Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"> <!-- For Icons -->
    <script src="assets/js/app.js" defer></script>
    <script src="assets/js/cart.js" defer></script>
  </head>

  <body>
    <!--NAVIGATOR SECTION-->
    <section class="nav">
      <a href="index.php"> <!--FOR LOGO-->
        <img alt="logo" class="logo" src="img/materials/logo.png">
      </a>

      <ul class="navbar"> <!--FOR NAVIGATION BAR-->
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="shop.php#men_categories">Men</a></li>
        <li><a href="shop.php#women_categories">Women</a></li>
        <li><a href="shop.php#accessories_categories">Accessories</a></li>
        <li><a href="shop.php#footwear_categories">Footwear</a></li>
        <li class="mobile-only"><a href="about_services_contact.html#about">About Us</a></li>
        <li class="mobile-only"><a href="about_services_contact.html#services">Services</a></li>
        <li class="mobile-only"><a href="about_services_contact.html#contact">Contact</a></li>
        <li class="mobile-only"><a href="logout.php">Logout</a></li>
      </ul>

      <div class="icon"> <!--FOR ICONS: USER PROFILE (change)-->
        <a href="cart.php" id="cart-link"><i class='bx bx-cart'><span id="cart-count">0</span></i></a>
        <a href="profile.php"><i class='bx bx-user'></i></a>

        <div class='bx bx-menu' id="menu" onclick="toggleMenu()"></div> <!--FOR ICON: MENU-->
        <ul class="dropdown-menu desktop-dropdown"> <!--FOR MENU CONTENTS: ABOUT, SERVICES, CONTACT, SETTINGS-->
          <li><a href="about_services_contact.html#about">About Us</a></li>
          <li><a href="about_services_contact.html#services">Services</a></li>
          <li><a href="about_services_contact.html#contact">Contact</a></li>
          <li><a href="logout.php" style="color:#bab69d; font-size:19px;"><i class='bx bx-log-out-circle' style="color:#bab69d; font-size:16px;"></i>Logout</a>
          <li>
        </ul>
      </div>
    </section>

    <!--LANDING PAGE SECTION-->
    <section id="landing-page">
      <div class="main-text"> <!--FOR TEXTS-->
        <h2><i>Your style, your story – start it here!</i></h2>
        <h1>Trend <br> <span style="color:#747264">Vault</span></h1>
        <p>Whether you're looking for everyday essentials or statement pieces, we've got you covered. Explore our collection and unlock
          a vault of fashion that inspires confidence and celebrates individuality.</p>

        <a href="shop.php" class="shopnow" id="shopnow">Shop Now <i class="fa-solid fa-arrow-right"></i></a> <!--FOR SHOPNOW BUTTON-->
      </div>

      <div class="down-arrow"> <!--FOR DOWN BUTTON-->
        <a href="#categories" class="down"><i class="fa-solid fa-angles-down"></i></a>
      </div>
    </section>

    <!--CATEGORY OF PRODUCTS SECTION-->
    <section id="categories">
      <div class="slider-container">
        <h1>CATEGORIES</h1>

        <div class="slider">
          <!-- Original products -->
          <div class="product">
            <img src="img/products/accessories_model.jpg" alt="Accessories model" class="default">
            <img src="img/products/accessories_product.jpg" alt="Accessories product" class="hover">
            <h3>Accessories</h3>
          </div>

          <div class="product">
            <img src="img/products/footwear_model.jpg" alt="Footwear model" class="default">
            <img src="img/products/footwear_product.jpg" alt="Footwear product" class="hover">
            <h3>Footwear</h3>
          </div>

          <div class="product">
            <img src="img/products/top_model.jpg" alt="Tops model" class="default">
            <img src="img/products/top_product.jpg" alt="Tops product" class="hover">
            <h3>Tops</h3>
          </div>

          <div class="product">
            <img src="img/products/bottom_model.jpg" alt="Bottoms model" class="default">
            <img src="img/products/bottom_product.jpg" alt="Bottoms product" class="hover">
            <h3>Bottoms</h3>
          </div>

          <div class="product">
            <img src="img/products/bag_model.jpg" alt="Bags model" class="default">
            <img src="img/products/bag_product.jpg" alt="Bags product" class="hover">
            <h3>Bags</h3>
          </div>

          <div class="product">
            <img src="img/products/dress_model.jpg" alt="Dress model" class="default">
            <img src="img/products/dress_product.jpg" alt="Dress product" class="hover">
            <h3>Dress</h3>
          </div>

          <!-- Duplicate products for infinite loop -->
          <div class="product">
            <img src="img/products/accessories_model.jpg" alt="Accessories model" class="default">
            <img src="img/products/accessories_product.jpg" alt="Accessories product" class="hover">
            <h3>Accessories</h3>
          </div>

          <div class="product">
            <img src="img/products/footwear_model.jpg" alt="Footwear model" class="default">
            <img src="img/products/footwear_product.jpg" alt="Footwear product" class="hover">
            <h3>Footwear</h3>
          </div>

          <div class="product">
            <img src="img/products/top_model.jpg" alt="Tops model" class="default">
            <img src="img/products/top_product.jpg" alt="Tops product" class="hover">
            <h3>Tops</h3>
          </div>

          <div class="product">
            <img src="img/products/bottom_model.jpg" alt="Bottoms model" class="default">
            <img src="img/products/bottom_product.jpg" alt="Bottoms product" class="hover">
            <h3>Bottoms</h3>
          </div>

          <div class="product">
            <img src="img/products/bag_model.jpg" alt="Bags model" class="default">
            <img src="img/products/bag_product.jpg" alt="Bags product" class="hover">
            <h3>Bags</h3>
          </div>

          <div class="product">
            <img src="img/products/dress_model.jpg" alt="Dress model" class="default">
            <img src="img/products/dress_product.jpg" alt="Dress product" class="hover">
            <h3>Dress</h3>
          </div>
        </div>
      </div>
    </section>

    <!--FEATURED PRODUCTS SECTION-->
    <section id="featured-products">
      <h1>FEATURED COLLECTION</h1>

      <div class="product-grid">
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured1.jpg" alt="featured1">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured2.jpg" alt="featured2">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured3.jpg" alt="featured3">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured4.jpg" alt="featured4">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="product-grid">
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured5.jpg" alt="featured5">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured6.jpg" alt="featured6">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured7.jpg" alt="featured7">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/featured8.jpg" alt="featured8">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--SALE BANNER SECTION-->
    <section id="sale">
      <div class="text">
        <a href="shop.php">
          <h3>Continue Shopping</h3>
        </a>
      </div>
    </section>

    <!--NEW ARRIVALS SECTION-->
    <section id="new-arrivals">
      <h1>NEW ARRIVALS</h1>

      <div class="product-grid">
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new1.jpg" alt="new1">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new2.jpg" alt="new2">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new3.jpg" alt="new3">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new4.jpg" alt="new4">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="product-grid">
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new5.jpg" alt="new5">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new6.jpg" alt="new6">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new7.jpg" alt="new7">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-label"><i class="fa-solid fa-fire"></i></div>
          <div class="image-container">
            <img src="img/products/new8.jpg" alt="new8">
            <div class="check">
              <a href="#">
                <h3>Check This Out</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--DISCOUNTS GALLERY SECTION-->
    <section class="discounts">
      <div class="images">
        <div class="image-one">
          <a>
            <img src="img/discounts/1.png" alt="discounts">
          </a>
        </div>

        <div class="image-one">
          <a>
            <img src="img/discounts/3.png" alt="discounts">
          </a>
        </div>

        <div class="image-two">
          <a>
            <img src="img/discounts/4.png" alt="discounts">
          </a>
        </div>

        <div class="image-two">
          <a>
            <img src="img/discounts/2.png" alt="discounts">
          </a>
        </div>
      </div>
    </section>

    <!--FOOTER SECTION-->
    <footer>
      <div class="footer-container">
        <!-- About Us -->
        <div class="footer-section">
          <h4>About Us</h4>
          <p> At Trend Vault, we bring you the latest trends in fashion. Celebrate your individuality with us!</p>
          <a href="about.html">Learn More</a>
        </div>

        <!-- Customer Service -->
        <div class="footer-section">
          <h4>Customer Service</h4>
          <ul>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="faqs.html">FAQs</a></li>
            <li><a href="shipping.html">Shipping & Delivery</a></li>
            <li><a href="returns.html">Returns & Exchanges</a></li>
            <li><a href="track-order.html">Track Your Order</a></li>
          </ul>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="shop-men.html">Shop Men</a></li>
            <li><a href="shop-women.html">Shop Women</a></li>
            <li><a href="new-arrivals.html">New Arrivals</a></li>
            <li><a href="best-sellers.html">Best Sellers</a></li>
            <li><a href="sale.html">Sale</a></li>
          </ul>
        </div>

        <!-- Newsletter Subscription -->
        <div class="footer-section">
          <h4>Stay Connected</h4>
          <p>Sign up for exclusive offers and updates!</p>
          <form class="subscribe">
            <input type="email" placeholder="Enter your email" />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>

      <!-- Social Media & Payment -->
      <div class="footer-bottom">
        <div class="social-media">
          <h4>Follow Us</h4>
          <a href="https://instagram.com"><i class='bx bxl-instagram-alt'></i></a>
          <a href="https://facebook.com"><i class='bx bxl-facebook-square'></i></a>
          <a href="https://github.com"><i class='bx bxl-github'></i></a>
          <a href="https://twitter.com"><i class='bx bxl-twitter'></i></a>
        </div>
        <div class="payment-options">
          <img src="img/materials/payment.png" alt="Visa" />
        </div>
      </div>

      <!-- Copyright -->
      <div class="footer-copy">
        <p>© 2024 Trend Vault. All Rights Reserved.</p>
      </div>
    </footer>

    <!--FOR NAVIGATOR EFFECT WHEN SCROLL UP-->
    <script type="text/javascript">
      window.addEventListener("scroll", function() {
        var header = document.querySelector(".nav");
        header.classList.toggle("sticky", window.scrollY > 0);
      })
    </script>

  </body>

  </html>

<?php
}
?>