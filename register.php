<?php
include 'includes/connect.php';

if (isset($_POST['signUp'])) {
	$firstName = isset($_POST['fname']) ? $_POST['fname'] : '';
	$lastName = isset($_POST['lname']) ? $_POST['lname'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';


	if (!empty($password)) {
		$password = md5($password);
	}


	$checkEmail = "SELECT * FROM users WHERE email='$email'";
	$result = $conn->query($checkEmail);
	if ($result->num_rows > 0) {
		echo "Email Address Already Exists!";
	} else {
		$insertQuery = "INSERT INTO users (fname, lname, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
		if ($conn->query($insertQuery) === TRUE) {
			header("Location: login.php");
			exit();
		} else {
			echo "Error: " . $conn->error;
		}
	}
}


if (isset($_POST['signIn'])) {
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if (!empty($password)) {
		$password = md5($password);
	}

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		session_start();
		$row = $result->fetch_assoc();

		$_SESSION['users'] = [
			'id' => $row['id'],
			'fname' => $row['fname'],
			'lname' => $row['lname'],
			'email' => $row['email'],
		];

		header("Location: index.php");
		exit();
	} else {
		echo "Not Found, Incorrect Email or Password";
	}
}
