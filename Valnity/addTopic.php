<?php
	include('config.php');
	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d");
	
	if(isset($_POST['submit'])) {
		$name = $_FILES['picture']['name'];
		$target_dir = "image/";
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);

		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		// Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");

		// Check extension
		if( in_array($imageFileType,$extensions_arr) ){
			// Upload file
			if(move_uploaded_file($_FILES['picture']['tmp_name'],$target_dir.$name)){
				// Insert record
				$judul = $_POST['judul'];
				$pic = basename($_FILES['picture']['name']);
				$desc = $_POST['deskripsi'];
		
				$insert = "INSERT INTO topic(judul, deskripsi, picture, postDate)
					VALUE('$judul', '$desc', '$pic', '$date')";
			
				if (mysqli_query($conn, $insert)){
					echo"Insert $judul Berhasil!";
					echo"<script>alert('Topic Added')</script>";
				}
				mysqli_close($conn);
			}
		}
	}
?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Style/styleindex.css">
	<title>ADD TOPIC</title>
</head>
<body>
	<div class="login-box">
		<h2>ADD TOPIC</h2>
		<form action="" method="POST" class="login-email"  enctype="multipart/form-data">
			<div class="input-group">
				<input type="text" name="judul" required>
				<label>Judul</label>
			</div>
			<div class="input-group">
				<input type="file" name="picture" id="picture" required>
            </div>
            <div class="input-group">
				<input type="textbox" name="deskripsi" required>
				<label>deskripsi</label>
			</div>
			<div class="input-group button">
				<button name="submit" class="btn">ADD Topic</button>
			</div>
			<p class="login-register-text">Back to menu <a href="adminTopic.php">Admin</a>.</p>
		</form>
	</div>
</body>
</html>