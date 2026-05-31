<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>
</head>

<body>

	<?php
	include 'includes/connect.php';

	if (isset($_GET['token'])) {
		$token = $_GET['token'];

		// Check if the token exists in the password_resets table
		$checkTokenQuery = "SELECT * FROM password_resets WHERE token='$token' AND created_at > NOW() - INTERVAL 1 HOUR"; // Token expiration (1 hour)
		$result = $conn->query($checkTokenQuery);

		if ($result->num_rows > 0) {
			// Token is valid, show the reset password form
			if (isset($_POST['resetPassword'])) {
				$newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';

				if (!empty($newPassword)) {
					$newPassword = md5($newPassword); // Hash the new password

					// Get email associated with the token
					$row = $result->fetch_assoc();
					$email = $row['email'];

					// Update the password in the users table
					$updatePasswordQuery = "UPDATE users SET password='$newPassword' WHERE email='$email'";
					if ($conn->query($updatePasswordQuery) === TRUE) {
						// Delete the token after it's used
						$deleteTokenQuery = "DELETE FROM password_resets WHERE token='$token'";
						$conn->query($deleteTokenQuery);
						echo "Your password has been reset successfully!";
					} else {
						echo "Error: Could not update password.";
					}
				} else {
					echo "Please enter a new password.";
				}
			}
		} else {
			echo "Invalid or expired token.";
		}
	} else {
		echo "No token found.";
	}
	?>

	<form action="resetpass.php?token=<?php echo $_GET['token']; ?>" method="POST">
		<input type="password" name="newPassword" placeholder="Enter your new password" required>
		<button type="submit" name="resetPassword">Reset Password</button>
	</form>

</body>

</html>