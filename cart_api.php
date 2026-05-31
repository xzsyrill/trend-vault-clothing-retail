<?php
require_once 'includes/connect.php';
require_once 'includes/auth.php';
header('Content-Type: application/json');

if (!is_logged_in()) {
	http_response_code(401);
	echo json_encode(['success' => false, 'message' => 'Please login or create an account first.', 'redirect' => 'login.php']);
	exit();
}

$user_id = current_user_id();
$action = $_POST['action'] ?? $_GET['action'] ?? 'get';

$conn->query("CREATE TABLE IF NOT EXISTS cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  size VARCHAR(30) NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  image VARCHAR(255) DEFAULT '',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_user_product (user_id, product_name, size)
)");

function cart_rows(mysqli $conn, int $user_id): array
{
	$stmt = $conn->prepare('SELECT id, product_name AS name, price, size, quantity, image FROM cart_items WHERE user_id=? ORDER BY id DESC');
	$stmt->bind_param('i', $user_id);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQLI_ASSOC) ?: [];
}

if ($action === 'add') {
	$name = trim($_POST['name'] ?? '');
	$price = (float)($_POST['price'] ?? 0);
	$size = trim($_POST['size'] ?? 'N/A');
	$quantity = max(1, (int)($_POST['quantity'] ?? 1));
	$image = trim($_POST['image'] ?? '');

	if ($name === '' || $price <= 0) {
		http_response_code(422);
		echo json_encode(['success' => false, 'message' => 'Invalid product details.']);
		exit();
	}

	$stmt = $conn->prepare('INSERT INTO cart_items (user_id, product_name, price, size, quantity, image) VALUES (?,?,?,?,?,?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity), price = VALUES(price), image = VALUES(image)');
	$stmt->bind_param('isdsis', $user_id, $name, $price, $size, $quantity, $image);
	$stmt->execute();
	echo json_encode(['success' => true, 'cart' => cart_rows($conn, $user_id)]);
	exit();
}

if ($action === 'update') {
	$id = (int)($_POST['id'] ?? 0);
	$quantity = max(1, (int)($_POST['quantity'] ?? 1));
	$stmt = $conn->prepare('UPDATE cart_items SET quantity=? WHERE id=? AND user_id=?');
	$stmt->bind_param('iii', $quantity, $id, $user_id);
	$stmt->execute();
	echo json_encode(['success' => true, 'cart' => cart_rows($conn, $user_id)]);
	exit();
}

if ($action === 'remove') {
	$id = (int)($_POST['id'] ?? 0);
	$stmt = $conn->prepare('DELETE FROM cart_items WHERE id=? AND user_id=?');
	$stmt->bind_param('ii', $id, $user_id);
	$stmt->execute();
	echo json_encode(['success' => true, 'cart' => cart_rows($conn, $user_id)]);
	exit();
}

echo json_encode(['success' => true, 'cart' => cart_rows($conn, $user_id)]);
