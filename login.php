<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register and Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
	<?php if (isset($_GET["login_required"])): ?><p class="login-required-message">Please login or create an account first before using the cart.</p><?php endif; ?>
	<!--FOR SIGN UP ACCOUNT-->
	<div class="container" id="signup" style="display:none;">
		<h1 class="form-title">Register</h1>
		<form method="post" action="register.php">
			<div class="input-group">
				<i class="fas fa-user"></i>
				<input type="text" name="fname" id="fname" placeholder="First Name" required>
				<label for="fname">First Name</label>
			</div>
			<div class="input-group">
				<i class="fas fa-user"></i>
				<input type="text" name="lname" id="lname" placeholder="Last Name" required>
				<label for="lname">Last Name</label>
			</div>
			<div class="input-group">
				<i class="fas fa-envelope"></i>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<label for="email">Email</label>
			</div>
			<div class="input-group">
				<i class="fas fa-lock"></i>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<label for="password">Password</label>
			</div>
			<input type="submit" class="btn" value="Sign Up" name="signUp">
			<a href="index.php" class="browse-btn">Browse</a>
			<div style="margin-bottom: 20px;"></div>

			<div class="icons">
				<i class="fab fa-google"></i>
				<i class="fab fa-facebook"></i>
			</div>
			<div class="links">
				<p>Already Have Account?</p>
				<button id="signInButton">Sign In</button>
			</div>
		</form>
	</div>

	<!--FOR SIGN IN ACCOUNT-->
	<div class="container" id="sigIn" style="display:block;">
		<h1 class="form-title">Sign In</h1>
		<form method="post" action="register.php">
			<div class="input-group">
				<i class="fas fa-envelope"></i>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<label for="email">Email</label>
			</div>
			<div class="input-group">
				<i class="fas fa-lock"></i>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<label for="password">Password</label>
			</div>
			<p class="recover">
				<a href="passwordrecover.php">Recover Password</a>
			</p>

			<input type="submit" class="btn" value="Sign In" name="signIn">
			<a href="index.php" class="browse-btn">Browse</a>
			<div style="margin-bottom: 20px;"></div>

			<div class="icons">
				<i class="fab fa-google"></i>
				<i class="fab fa-facebook"></i>
			</div>
			<div class="links">
				<p>Don't have account yet?</p>
				<button id="signUpButton">Sign Up</button>
			</div>
		</form>
	</div>

	<script src="assets/js/app.js"></script>
</body>

</html>