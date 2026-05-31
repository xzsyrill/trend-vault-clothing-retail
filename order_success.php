<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trend Vault | Order Success</title>
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/shop.css">
  <link rel="stylesheet" href="assets/css/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="assets/js/app.js" defer></script>
  <script src="assets/js/cart.js" defer></script>
</head>

<body>
  <section class="nav">
    <a href="index.php"><img alt="logo" class="logo" src="img/materials/logo.png"></a>
    <ul class="navbar">
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
    <div class="icon">
      <a href="cart.php" id="cart-link"><i class='bx bx-cart'><span id="cart-count">0</span></i></a>
      <a href="profile.php"><i class='bx bx-user'></i></a>
      <div class='bx bx-menu' id="menu" onclick="toggleMenu()"></div>
      <ul class="dropdown-menu desktop-dropdown">
        <li><a href="about_services_contact.html#about">About Us</a></li>
        <li><a href="about_services_contact.html#services">Services</a></li>
        <li><a href="about_services_contact.html#contact">Contact</a></li>
        <li><a href="logout.php" style="color:#bab69d; font-size:19px;"><i class='bx bx-log-out-circle' style="color:#bab69d; font-size:16px;"></i>Logout</a></li>
      </ul>
    </div>
  </section>
  <main class="success-page">
    <div class="success-card">
      <h1>Order Placed!</h1>
      <p>Thank you for shopping at Trend Vault. Your order has been received.</p>
      <a class="back-home" href="index.php">Back to Home</a>
    </div>
  </main>
  <script>
    window.addEventListener("scroll", function() {
      var header = document.querySelector(".nav");
      header.classList.toggle("sticky", window.scrollY > 0);
    });
  </script>
</body>

</html>