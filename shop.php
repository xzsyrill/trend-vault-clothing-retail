<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trend Vault | Shop</title>
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/shop.css">
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
      <a href="cart.php" id="cart-link">
        <i class='bx bx-cart'><span id="cart-count">0</span></i>
      </a>
      <a href="profile.php"><i class='bx bx-user'></i></a>

      <div class='bx bx-menu' id="menu" onclick="toggleMenu()"></div> <!--FOR ICON: MENU-->
      <ul class="dropdown-menu desktop-dropdown"> <!--FOR MENU CONTENTS: ABOUT, SERVICES, CONTACT, SETTINGS-->
        <li><a href="about_services_contact.html#about">About Us</a></li>
        <li><a href="about_services_contact.html#services">Services</a></li>
        <li><a href="about_services_contact.html#contact">Contact</a></li>
        <li><a href="logout.php" style="color:#bab69d; font-size:19px;"><i class='bx bx-log-out-circle' style="color:#bab69d; font-size:16px;"></i>Logout</a></li>
      </ul>
    </div>
  </section>

  <!--PRODUCTS SECTION-->
  <section id="product-checkout">
    <div class="collection"><!--MEN'S IMAGE-->
      <img id="men_categories" src="img/collection/1.png" alt="collection">
    </div>
    <div class="men_categories"><!--MEN'S CATEGORY-->
      <div class="grid">
        <div class="card"><!--product 1-->
          <img src="img/products/featured5.jpg" alt="">
          <h3>STATEMENT T-SHIRT</h3>
          <p>Price: ₱<span id="price-shirt1">495.00</span></p>
          <div class="size-quantity">
            <label for="shirt1-size">Size:</label>
            <select id="shirt1-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt1')">
              <option value="S" data-price="495.00">S</option>
              <option value="M" data-price="500.00">M</option>
              <option value="L" data-price="550.00">L</option>
              <option value="XL" data-price="555.00">XL</option>
            </select><br><br>
            <label for="shirt1-quantity">Quantity:</label>
            <input type="number" id="shirt1-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 2-->
          <img src="img/products/featured6.jpg" alt="">
          <h3>POLO SHIRT</h3>
          <p>Price: ₱<span id="price-shirt2">790</span></p>
          <div class="size-quantity">
            <label for="shirt2-size">Size:</label>
            <select id="shirt2-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt2')">
              <option value="S" data-price="790">S</option>
              <option value="M" data-price="800">M</option>
              <option value="L" data-price="820">L</option>
              <option value="XL" data-price="880">XL</option>
            </select><br><br>
            <label for="shirt2-quantity">Quantity:</label>
            <input type="number" id="shirt2-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 3-->
          <img src="img/products/allsaints.jpg" alt="">
          <h3>ALLSAINTS SHIRT</h3>
          <p>Price: ₱<span id="price-shirt3">350</span></p>
          <div class="size-quantity">
            <label for="shirt3-size">Size:</label>
            <select id="shirt3-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt3')">
              <option value="S" data-price="350">S</option>
              <option value="M" data-price="400">M</option>
              <option value="L" data-price="450">L</option>
              <option value="XL" data-price="500">XL</option>
            </select><br><br>
            <label for="shirt3-quantity">Quantity:</label>
            <input type="number" id="shirt3-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 4-->
          <img src="img/products/hiphop.webp" alt="">
          <h3>HIP-HOP SHIRT</h3>
          <p>Price: ₱<span id="price-shirt4">350</span></p>
          <div class="size-quantity">
            <label for="shirt4-size">Size:</label>
            <select id="shirt4-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt4')">
              <option value="S" data-price="350">S</option>
              <option value="M" data-price="400">M</option>
              <option value="L" data-price="450">L</option>
              <option value="XL" data-price="500">XL</option>
            </select><br><br>
            <label for="shirt4-quantity">Quantity:</label>
            <input type="number" id="shirt4-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 13-->
          <img src="img/products/featured7.jpg" alt="">
          <h3>LIGHT BLUE SLIM-FIT DENIM JEANS</h3>
          <p>Price: ₱<span id="price-shirt13">890</span></p>
          <div class="size-quantity">
            <label for="shirt13-size">Size:</label>
            <select id="shirt13-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt13')">
              <option value="S" data-price="900">S</option>
              <option value="M" data-price="920">M</option>
              <option value="L" data-price="940">L</option>
              <option value="XL" data-price="950">XL</option>
            </select><br><br>
            <label for="shirt4-quantity">Quantity:</label>
            <input type="number" id="shirt13-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 14-->
          <img src="img/products/featured8.jpg" alt="">
          <h3>BEIGE RELAXED-FIT CHINOS</h3>
          <p>Price: ₱<span id="price-shirt14">350</span></p>
          <div class="size-quantity">
            <label for="shirt14-size">Size:</label>
            <select id="shirt14-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt14')">
              <option value="S" data-price="350">S</option>
              <option value="M" data-price="400">M</option>
              <option value="L" data-price="450">L</option>
              <option value="XL" data-price="500">XL</option>
            </select><br><br>
            <label for="shirt14-quantity">Quantity:</label>
            <input type="number" id="shirt14-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 15-->
          <img src="img/products/new1.jpg" alt="">
          <h3>WHITE DENIM SLEEVELESS VEST</h3>
          <p>Price: ₱<span id="price-shirt15">550</span></p>
          <div class="size-quantity">
            <label for="shirt4-size">Size:</label>
            <select id="shirt15-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt15')">
              <option value="S" data-price="550">S</option>
              <option value="M" data-price="555">M</option>
              <option value="L" data-price="560">L</option>
              <option value="XL" data-price="565">XL</option>
            </select><br><br>
            <label for="shirt15-quantity">Quantity:</label>
            <input type="number" id="shirt15-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 16-->
          <img src="img/products/new2.jpg" alt="">
          <h3>NAVY BLUE TEXTURED TEE</h3>
          <p>Price: ₱<span id="price-shirt16">350</span></p>
          <div class="size-quantity">
            <label for="shirt16-size">Size:</label>
            <select id="shirt16-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt16')">
              <option value="S" data-price="350">S</option>
              <option value="M" data-price="360">M</option>
              <option value="L" data-price="370">L</option>
              <option value="XL" data-price="380">XL</option>
            </select><br><br>
            <label for="shirt16-quantity">Quantity:</label>
            <input type="number" id="shirt4-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
      </div>
    </div>

    <div class="collection" id="women_categories"><!--WOMEN'S IMAGE-->
      <img src="img/collection/2.png" alt="collection">
    </div>
    <div class="women_categories"><!--WOMEN'S CATEGORY-->
      <div class="grid">
        <div class="card"><!--product 5-->
          <img src="img/products/featured1.jpg" alt="">
          <h3>NAVY BLUE CARGO PANTS</h3>
          <p>Price: ₱<span id="price-shirt5">750</span></p>
          <div class="size-quantity">
            <label for="shirt5-size">Size:</label>
            <select id="shirt5-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt5')">
              <option value="S" data-price="750">S</option>
              <option value="M" data-price="770">M</option>
              <option value="L" data-price="800">L</option>
              <option value="XL" data-price="850">XL</option>
            </select><br><br>
            <label for="shirt5-quantity">Quantity:</label>
            <input type="number" id="shirt5-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 6-->
          <img src="img/products/featured2.jpg" alt="">
          <h3>MESH CROP TOP</h3>
          <p>Price: ₱<span id="price-shirt6">320</span></p>
          <div class="size-quantity">
            <label for="shirt6-size">Size:</label>
            <select id="shirt6-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt6')">
              <option value="S" data-price="320">S</option>
              <option value="M" data-price="350">M</option>
              <option value="L" data-price="370">L</option>
              <option value="XL" data-price="390">XL</option>
            </select><br><br>
            <label for="shirt6-quantity">Quantity:</label>
            <input type="number" id="shirt6-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 7-->
          <img src="img/products/featured3.jpg" alt="">
          <h3>SHEER OVERSIZED SHIRT</h3>
          <p>Price: ₱<span id="price-shirt7">499</span></p>
          <div class="size-quantity">
            <label for="shirt7-size">Size:</label>
            <select id="shirt7-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt7')">
              <option value="S" data-price="499">S</option>
              <option value="M" data-price="510">M</option>
              <option value="L" data-price="520">L</option>
              <option value="XL" data-price="530">XL</option>
            </select><br><br>
            <label for="shirt7-quantity">Quantity:</label>
            <input type="number" id="shirt7-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 8-->
          <img src="img/products/new7.jpg" alt="">
          <h3>SLEEVELESS BLACK & WHITE DRESS</h3>
          <p>Price: ₱<span id="price-shirt8">875</span></p>
          <div class="size-quantity">
            <label for="shirt8-size">Size:</label>
            <select id="shirt8-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt8')">
              <option value="S" data-price="875">S</option>
              <option value="M" data-price="880">M</option>
              <option value="L" data-price="890">L</option>
              <option value="XL" data-price="900">XL</option>
            </select><br><br>
            <label for="shirt8-quantity">Quantity:</label>
            <input type="number" id="shirt8-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 17-->
          <img src="img/products/featured4.jpg" alt="">
          <h3>BLACK CASUAL JOGGER</h3>
          <p>Price: ₱<span id="price-shirt17">729</span></p>
          <div class="size-quantity">
            <label for="shirt17-size">Size:</label>
            <select id="shirt17-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt17')">
              <option value="S" data-price="729">S</option>
              <option value="M" data-price="739">M</option>
              <option value="L" data-price="749">L</option>
              <option value="XL" data-price="759">XL</option>
            </select><br><br>
            <label for="shirt17-quantity">Quantity:</label>
            <input type="number" id="shirt17-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 18-->
          <img src="img/products/new5.jpg" alt="">
          <h3>BLACK DENIM MIDI SKIRT</h3>
          <p>Price: ₱<span id="price-shirt18">775</span></p>
          <div class="size-quantity">
            <label for="shirt18-size">Size:</label>
            <select id="shirt18-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt18')">
              <option value="S" data-price="775">S</option>
              <option value="M" data-price="780">M</option>
              <option value="L" data-price="785">L</option>
              <option value="XL" data-price="790">XL</option>
            </select><br><br>
            <label for="shirt18-quantity">Quantity:</label>
            <input type="number" id="shirt18-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 19-->
          <img src="img/products/women1.jpg" alt="">
          <h3>BAGGY CARGO PANTS</h3>
          <p>Price: ₱<span id="price-shirt19">799</span></p>
          <div class="size-quantity">
            <label for="shirt19-size">Size:</label>
            <select id="shirt19-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt19')">
              <option value="S" data-price="799">S</option>
              <option value="M" data-price="819">M</option>
              <option value="L" data-price="825">L</option>
              <option value="XL" data-price="831">XL</option>
            </select><br><br>
            <label for="shirt19-quantity">Quantity:</label>
            <input type="number" id="shirt19-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 20-->
          <img src="img/products/women2.jpg" alt="">
          <h3>SEAMLESS RIBBED CROPPED TOP</h3>
          <p>Price: ₱<span id="price-shirt20">549</span></p>
          <div class="size-quantity">
            <label for="shirt20-size">Size:</label>
            <select id="shirt20-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt20')">
              <option value="S" data-price="549">S</option>
              <option value="M" data-price="555">M</option>
              <option value="L" data-price="560">L</option>
              <option value="XL" data-price="569">XL</option>
            </select><br><br>
            <label for="shirt20-quantity">Quantity:</label>
            <input type="number" id="shirt20-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
      </div>
    </div>

    <div class="collection" id="accessories_categories"><!--ACCESSORIES'S IMAGE-->
      <img src="img/collection/3.png" alt="collection">
    </div>
    <div class="accessories_categories"><!--ACCESSORIES' CATEGORY-->
      <div class="grid">
        <div class="card"><!--product 9-->
          <img src="img/products/new4.jpg" alt="">
          <h3>BROWN LEATHER BELT</h3>
          <p>Price: ₱<span id="price-shirt9">250</span></p>
          <div class="size-quantity">
            <label for="shirt9-size" style="color: gray">Size:</label>
            <select id="shirt9-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt9')">
              <option disabled value="S" data-price="250">S</option>
              <option disabled value="M" data-price="250">M</option>
              <option disabled value="L" data-price="250">L</option>
              <option disabled value="XL" data-price="250">XL</option>
            </select><br><br>
            <label for="shirt9-quantity">Quantity:</label>
            <input type="number" id="shirt9-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 10-->
          <img src="img/products/new6.jpg" alt="">
          <h3>BEIGE TOTEBAG</h3>
          <p>Price: ₱<span id="price-shirt10">280</span></p>
          <div class="size-quantity">
            <label for="shirt10-size" style="color: gray">Size:</label>
            <select id="shirt10-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt10')">
              <option disabled value="S" data-price="280">S</option>
              <option disabled value="M" data-price="280">M</option>
              <option disabled value="L" data-price="280">L</option>
              <option disabled value="XL" data-price="280">XL</option>
            </select><br><br>
            <label for="shirt10-quantity">Quantity:</label>
            <input type="number" id="shirt10-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 11-->
          <img src="img/products/accessories1.jpg" alt="">
          <h3>3 PCS HANDKERCHIEFS</h3>
          <p>Price: ₱<span id="price-shirt11">200</span></p>
          <div class="size-quantity">
            <label for="shirt11-size" style="color: gray">Size:</label>
            <select id="shirt11-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt11')">
              <option disabled value="S" data-price="200">S</option>
              <option disabled value="M" data-price="200">M</option>
              <option disabled value="L" data-price="200">L</option>
              <option disabled value="XL" data-price="200">XL</option>
            </select><br><br>
            <label for="shirt11-quantity">Quantity:</label>
            <input type="number" id="shirt11-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 12-->
          <img src="img/products/accessories2.jpg" alt="">
          <h3>SHORT BIFOLD WALLET</h3>
          <p>Price: ₱<span id="price-shirt12">299</span></p>
          <div class="size-quantity">
            <label for="shirt12-size" style="color: gray">Size:</label>
            <select id="shirt12-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt12')">
              <option disabled value="S" data-price="299">S</option>
              <option disabled value="M" data-price="299">M</option>
              <option disabled value="L" data-price="299">L</option>
              <option disabled value="XL" data-price="299">XL</option>
            </select><br><br>
            <label for="shirt12-quantity">Quantity:</label>
            <input type="number" id="shirt12-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 21-->
          <img src="img/products/accessories3.jpg" alt="">
          <h3>TRAVEL BAG</h3>
          <p>Price: ₱<span id="price-shirt21">665</span></p>
          <div class="size-quantity">
            <label for="shirt21-size" style="color: gray">Size:</label>
            <select id="shirt21-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt21')">
              <option disabled value="S" data-price="665">S</option>
              <option disabled value="M" data-price="665">M</option>
              <option disabled value="L" data-price="665">L</option>
              <option disabled value="XL" data-price="665">XL</option>
            </select><br><br>
            <label for="shirt21-quantity">Quantity:</label>
            <input type="number" id="shirt21-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 22-->
          <img src="img/products/accessories4.jpg" alt="">
          <h3>MEDIUM SLING BAG</h3>
          <p>Price: ₱<span id="price-shirt22">555</span></p>
          <div class="size-quantity">
            <label for="shirt22-size" style="color: gray">Size:</label>
            <select id="shirt22-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt22')">
              <option disabled value="S" data-price="555">S</option>
              <option disabled value="M" data-price="555">M</option>
              <option disabled value="L" data-price="555">L</option>
              <option disabled value="XL" data-price="555">XL</option>
            </select><br><br>
            <label for="shirt22-quantity">Quantity:</label>
            <input type="number" id="shirt22-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 23-->
          <img src="img/products/accessories5.jpg" alt="">
          <h3>3-IN-1 PACK SOCKS</h3>
          <p>Price: ₱<span id="price-shirt23">450</span></p>
          <div class="size-quantity">
            <label for="shirt23-size" style="color: gray">Size:</label>
            <select id="shirt23-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt23')">
              <option disabled value="S" data-price="450">S</option>
              <option disabled value="M" data-price="450">M</option>
              <option disabled value="L" data-price="450">L</option>
              <option disabled value="XL" data-price="450">XL</option>
            </select><br><br>
            <label for="shirt23-quantity">Quantity:</label>
            <input type="number" id="shirt23-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 24-->
          <img src="img/products/accessories6.jpg" alt="">
          <h3>SQUARE SUNGLASSES</h3>
          <p>Price: ₱<span id="price-shirt24">750</span></p>
          <div class="size-quantity">
            <label for="shirt24-size" style="color: gray">Size:</label>
            <select id="shirt24-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt24')">
              <option disabled value="S" data-price="299">S</option>
              <option disabled value="M" data-price="299">M</option>
              <option disabled value="L" data-price="299">L</option>
              <option disabled value="XL" data-price="299">XL</option>
            </select><br><br>
            <label for="shirt24-quantity">Quantity:</label>
            <input type="number" id="shirt24-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
      </div>
    </div>

    <div class="collection" id="footwear_categories"><!--FOOTWEAR'S IMAGE-->
      <img src="img/collection/4.png" alt="collection">
    </div>
    <div class="women_categories"><!--FOOTWEAR'S CATEGORY-->
      <div class="grid">
        <div class="card"><!--product 25-->
          <img src="img/products/footwear1.jpg" alt="">
          <h3>BEIGE CANVAS SNEAKERS</h3>
          <p>Price: ₱<span id="price-shirt25">1200</span></p>
          <div class="size-quantity">
            <label for="shirt25-size">Size:</label>
            <select id="shirt25-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt25')">
              <option value="5" data-price="1200">5</option>
              <option value="6" data-price="1250">6</option>
              <option value="7" data-price="1300">7</option>
              <option value="8" data-price="1350">8</option>
              <option value="9" data-price="1355">9</option>
              <option value="10" data-price="1360">10</option>
            </select><br><br>
            <label for="shirt25-quantity">Quantity:</label>
            <input type="number" id="shirt25-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 26-->
          <img src="img/products/footwear2.jpg" alt="">
          <h3>BLACK LEATHER LACE-UP SNEAKERS</h3>
          <p>Price: ₱<span id="price-shirt26">1888</span></p>
          <div class="size-quantity">
            <label for="shirt26-size">Size:</label>
            <select id="shirt26-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt26')">
              <option value="5" data-price="1888">5</option>
              <option value="6" data-price="1890">6</option>
              <option value="7" data-price="1895">7</option>
              <option value="8" data-price="1900">8</option>
              <option value="9" data-price="1910">9</option>
              <option value="10" data-price="1915">10</option>
            </select><br><br>
            <label for="shirt26-quantity">Quantity:</label>
            <input type="number" id="shirt26-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 27-->
          <img src="img/products/footwear3.jpg" alt="">
          <h3>OLIVE GREEN SLIDE SANDALS</h3>
          <p>Price: ₱<span id="price-shirt27">999</span></p>
          <div class="size-quantity">
            <label for="shirt27-size">Size:</label>
            <select id="shirt27-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt27')">
              <option value="5" data-price="999">5</option>
              <option value="6" data-price="1050">6</option>
              <option value="7" data-price="1100">7</option>
              <option value="8" data-price="1150">8</option>
              <option value="9" data-price="1155">9</option>
              <option value="10" data-price="1160">10</option>
            </select><br><br>
            <label for="shirt27-quantity">Quantity:</label>
            <input type="number" id="shirt27-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 28-->
          <img src="img/products/footwear4.jpg" alt="">
          <h3>MINT GREEN SLIP-ON SANDALS</h3>
          <p>Price: ₱<span id="price-shirt28">895</span></p>
          <div class="size-quantity">
            <label for="shirt28-size">Size:</label>
            <select id="shirt28-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt28')">
              <option value="5" data-price="895">5</option>
              <option value="6" data-price="900">6</option>
              <option value="7" data-price="910">7</option>
              <option value="8" data-price="915">8</option>
              <option value="9" data-price="920">9</option>
              <option value="10" data-price="925">10</option>
            </select><br><br>
            <label for="shirt28-quantity">Quantity:</label>
            <input type="number" id="shirt28-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 29-->
          <img src="img/products/footwear5.jpg" alt="">
          <h3>WHITE VELCRO STRAP SNEAKERS</h3>
          <p>Price: ₱<span id="price-shirt29">1100</span></p>
          <div class="size-quantity">
            <label for="shirt29-size">Size:</label>
            <select id="shirt29-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt29')">
              <option value="5" data-price="1100">5</option>
              <option value="6" data-price="1150">6</option>
              <option value="7" data-price="1200">7</option>
              <option value="8" data-price="1250">8</option>
              <option value="9" data-price="1300">9</option>
              <option value="10" data-price="1350">10</option>
            </select><br><br>
            <label for="shirt29-quantity">Quantity:</label>
            <input type="number" id="shirt29-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 30-->
          <img src="img/products/footwear6.jpg" alt="">
          <h3>FLIP-FLOPS W/ NAVY STRAPS</h3>
          <p>Price: ₱<span id="price-shirt30">500</span></p>
          <div class="size-quantity">
            <label for="shirt30-size">Size:</label>
            <select id="shirt30-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt30')">
              <option value="5" data-price="500">5</option>
              <option value="6" data-price="510">6</option>
              <option value="7" data-price="520">7</option>
              <option value="8" data-price="530">8</option>
              <option value="9" data-price="540">9</option>
              <option value="10" data-price="545">10</option>
            </select><br><br>
            <label for="shirt30-quantity">Quantity:</label>
            <input type="number" id="shirt30-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 31-->
          <img src="img/products/footwear7.jpg" alt="">
          <h3>BLACK SLIDE SANDALS</h3>
          <p>Price: ₱<span id="price-shirt31">677</span></p>
          <div class="size-quantity">
            <label for="shirt31-size">Size:</label>
            <select id="shirt31-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt31')">
              <option value="5" data-price="677">5</option>
              <option value="6" data-price="687">6</option>
              <option value="7" data-price="695">7</option>
              <option value="8" data-price="699">8</option>
              <option value="9" data-price="700">9</option>
              <option value="10" data-price="705">10</option>
            </select><br><br>
            <label for="shirt31-quantity">Quantity:</label>
            <input type="number" id="shirt31-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
        <div class="card"><!--product 32-->
          <img src="img/products/footwear8.jpg" alt="">
          <h3>BEIGE OUTDOOR SANDALS</h3>
          <p>Price: ₱<span id="price-shirt32">549</span></p>
          <div class="size-quantity">
            <label for="shirt32-size">Size:</label>
            <select id="shirt32-size" style="width: 60px; height: 25px; font-size: 15px;" onchange="updatePrice('shirt32')">
              <option value="5" data-price="549">5</option>
              <option value="6" data-price="555">6</option>
              <option value="7" data-price="560">7</option>
              <option value="8" data-price="569">8</option>
              <option value="9" data-price="575">9</option>
              <option value="10" data-price="580">10</option>
            </select><br><br>
            <label for="shirt32-quantity">Quantity:</label>
            <input type="number" id="shirt32-quantity" min="1" value="1" style="width: 60px; height: 25px; font-size: 15px;">
          </div>
          <button type="button" onclick="addToCartFromButton(this)">Add to Cart</button>
        </div>
      </div>
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