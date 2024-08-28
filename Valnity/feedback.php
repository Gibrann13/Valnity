<?php 
session_start();

 if($_SESSION['level']==""){
		header("Location: index.php");
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="Style/styleindex.css">
		<title>Feed Back</title>
	</head>
	<body>
		<div class="login-box">
			<h2>Feed Back</h2>
			<form action="" method="POST" class="feedback">
				<div class="input-group">
					<input type="text" name="userFeedback"  required>
					<label>Your Feed Back</label>
				</div>
					<h1>Hello <?php echo $_SESSION['username']; ?> $</h1>
				<p>Your feedback will be very useful for us</p>
				<div class="input-group button">
					<button name="submit" class="btn">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
include'config.php';
if (isset($_POST['submit'])) {
				$com = $_POST['userFeedback'];
				$sqlUser = "SELECT * FROM users";
				$varUser = mysqli_query($conn, $sqlUser);
				$userId;
				while($arrUser = mysqli_fetch_array($varUser)){
					if($_SESSION['username'] === $arrUser['username']){
						$userId = $arrUser['id'];
					}
				}
		
				$insert = "INSERT INTO feedback(idUser, userFeedback)
					VALUE('$userId', '$com')";
			
 if(	mysqli_query($conn, $insert)){
			echo "<script>alert('Berhasil.')</script>";
 }
 else{
			echo "<script>alert('Berhasil.')</script>";
 }
 }
			
		?>