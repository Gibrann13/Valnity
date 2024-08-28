<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		//ngeliat kalau email sudah terdaftar
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		//check email di db
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, level)
					VALUES ('$username', '$email', '$password', 'admin')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Admin Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Style/styleindex.css">
	<title>Register Form</title>
</head>
<body>
	<div class="login-box">
		<h2>Register</h2>
		<form action="" method="POST" class="login-email">
			<div class="input-group">
				<input type="text" name="username" required>
				<label>Username</label>
			</div>
			<div class="input-group">
				<input type="email" name="email" required>
				<label>Email</label>
			</div>
			<div class="input-group">
				<input type="password" name="password" required>
				<label>Password</label>
            </div>
            <div class="input-group">
				<input type="password" name="cpassword" required>
				<label>Confirm Password</label>
			</div>
			<div class="input-group button">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Back to menu <a href="adminTopic.php">Admin</a>.</p>
		</form>
	</div>
</body>
</html>