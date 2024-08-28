<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$login = mysqli_query($conn, $sql);
	
	$cek = mysqli_num_rows($login);
	if ($cek > 0) {
		$data = mysqli_fetch_assoc($login);
		// cek jika user login sebagai admin
		if($data['level']=="admin"){
			// buat session login dan username
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "admin";
			header("Location:adminTopic.php");

		// cek jika user login sebagai pengguna
		}else if($data['level']=="biasa"){
			// buat session login dan username
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "biasa";
			header("Location: home.php");
		} else {
			echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		}
	}else{
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
					<input type="email" name="email"  required>
					<label>Email</label>
				</div>
				<div class="input-group">
					<input type="password" name="password"  required>
					<label>password</label>
				</div>
				<div class="input-group button">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Dont have an account? <a href="register.php">Register Here</a>.</p>
			</form>
		</div>
	</body>
</html>