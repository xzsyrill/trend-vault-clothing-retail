<?php
require_once 'includes/connect.php';
require_once 'includes/auth.php';
require_login();
$user_id = current_user_id();

$conn->query("CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  fullname VARCHAR(150) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  address TEXT NOT NULL,
  payment_method VARCHAR(60) NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
$conn->query("CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  size VARCHAR(30) NOT NULL,
  quantity INT NOT NULL,
  image VARCHAR(255) DEFAULT ''
)");

$stmt = $conn->prepare('SELECT * FROM cart_items WHERE user_id=?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if (!$items) {
  header('Location: cart.php');
  exit();
}
$total = 0;
foreach ($items as $item) $total += (float)$item['price'] * (int)$item['quantity'];
$fullname = trim($_POST['fullname'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$payment = trim($_POST['payment'] ?? 'Cash on Delivery');

$stmt = $conn->prepare('INSERT INTO orders (user_id, fullname, phone, address, payment_method, total) VALUES (?,?,?,?,?,?)');
$stmt->bind_param('issssd', $user_id, $fullname, $phone, $address, $payment, $total);
$stmt->execute();
$order_id = $conn->insert_id;

$stmt = $conn->prepare('INSERT INTO order_items (order_id, product_name, price, size, quantity, image) VALUES (?,?,?,?,?,?)');
foreach ($items as $item) {
  $stmt->bind_param('isdsis', $order_id, $item['product_name'], $item['price'], $item['size'], $item['quantity'], $item['image']);
  $stmt->execute();
}
$stmt = $conn->prepare('DELETE FROM cart_items WHERE user_id=?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
header('Location: order_success.php');
exit();
