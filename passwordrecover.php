<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recover Password</title>
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>

	<?php
	include 'includes/connect.php';

	if (isset($_POST['recover'])) {
		$email = isset($_POST['email']) ? $_POST['email'] : '';

		// Check if the email exists in the database
		$checkEmail = "SELECT * FROM users WHERE email='$email'";
		$result = $conn->query($checkEmail);

		if ($result->num_rows > 0) {
			// Generate a unique token for password reset
			$token = bin2hex(random_bytes(50));  // Generate a random token

			// Store the token and email in the database (token expiration is optional)
			$insertTokenQuery = "INSERT INTO password_resets (email, token, created_at)
                             VALUES ('$email', '$token', NOW())";
			if ($conn->query($insertTokenQuery) === TRUE) {
				// Send password reset email
				$resetLink = "http://yourwebsite.com/reset_password.php?token=" . $token; // Replace with your actual domain
				$subject = "Password Reset Request";
				$message = "To reset your password, click the link below:\n\n" . $resetLink;
				$headers = "From: no-reply@yourwebsite.com";

				if (mail($email, $subject, $message, $headers)) {
					echo "Password reset link has been sent to your email.";
				} else {
					echo "Error: Could not send email.";
				}
			} else {
				echo "Error: Could not generate token.";
			}
		} else {
			echo "Email not found!";
		}
	}
	?>

	<form action="passwordrecover.php" method="POST">
		<input type="email" name="email" placeholder="Enter your email" required>
		<button type="submit" name="recover">Send Reset Link</button>
	</form>

</body>

</html>