<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

function is_logged_in()
{
	return isset($_SESSION['users']) && !empty($_SESSION['users']['id']);
}

function require_login()
{
	if (!is_logged_in()) {
		$next = urlencode($_SERVER['REQUEST_URI'] ?? 'shop.php');
		header("Location: login.php?login_required=1&next={$next}");
		exit();
	}
}

function current_user_id()
{
	return (int)($_SESSION['users']['id'] ?? 0);
}
