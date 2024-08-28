<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])) {
    header("Location: adminTopic.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: adminTopic.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="Style/styleindex.css">
		<title>Login Form</title>
	</head>
	<body>
		<div class="login-box">
			<h2>Login</h2>
			<form action="" method="POST" class="login-email">
				<div class="input-group">
					<input type="text" name="username"  required>
					<label>Username</label>
				</div>
				<div class="input-group">
					<input type="password" name="password"  required>
					<label>password</label>
				</div>
				<div class="input-group button">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Back to user <a href="index.php">Login</a></p>
			</form>
		</div>
	</body>
</html>