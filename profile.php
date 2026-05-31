<?php
session_start();
include 'includes/connect.php';

if (!isset($_SESSION['users'])) {
  header("Location: login.php");
  exit();
}

$user = $_SESSION['users'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trend Vault | Profile</title>
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> <!-- For Icons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"> <!-- For Icons -->
  <script src="assets/js/app.js"></script>
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
      <li><a href="shop.php#men_categories">Men</a>
        <SS /li>
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
        <li><a href="logout.php" style="color:#bab69d; font-size:19px;"><i class='bx bx-log-out-circle' style="color:#bab69d; font-size:16px;"></i>Logout</a></li>
      </ul>
      </ul>
    </div>
  </section>

  <section id="user">
    <div class="profile-container">
      <a href="index.php" class="close-icon">&times;</a>
      <i class='bx bxs-user-circle'></i>
      <h1>Welcome, <span style="color:#4e4d40; text-transform:uppercase;"><?php echo htmlspecialchars($user['fname']); ?>!</span></h1>
      <p><strong>Name: &nbsp;</strong> <?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></p>
      <p><strong>Email: &nbsp;</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    </div>
  </section>

  <!--FOOTER SECTION-->
  <footer>
    <div class="footer-container">
      <!-- About Us -->
      <div class="footer-section">
        <h4>About Us</h4>
        <p>At Trend Vault, we bring you the latest trends in fashion. Celebrate your individuality with us!</p>
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