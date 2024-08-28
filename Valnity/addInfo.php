<?php
	include('config.php');
	
	if(isset($_POST['submit'])) {
		$name = $_FILES['picture']['name'];
		$target_dir = "image/info/";
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
				$name = $_POST['name'];
				$pic = basename($_FILES['picture']['name']);
				$desc = $_POST['deskripsi'];
				$role = $_POST['role'];
				$type = $_POST['type'];
				$insert = "INSERT INTO info(name, role, descr, picture, type)
					VALUE('$name', '$role', '$desc', '$pic', '$type')";
			
				if (mysqli_query($conn, $insert)){
					echo"Insert $name Berhasil!";
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
	<title>ADD Info</title>
</head>
<body>
	<div class="login-box">
		<h2>ADD Info</h2>
		<form action="" method="POST" class="login-email"  enctype="multipart/form-data">
			<div class="input-group">
				<input type="text" name="name" required>
				<label>Name</label>
			</div>
			<div class="input-group">
				<input type="text" name="role" required>
				<label>Role</label>
			</div>
			<div class="input-group">
				<input type="text" name="type" required>
				<label>Type</label>
			</div>
			<div class="input-group">
				<input type="file" name="picture" id="picture" required>
            </div>
            <div class="input-group">
				<input type="textbox" name="deskripsi" required>
				<label>deskripsi</label>
			</div>
			<div class="input-group button">
				<button name="submit" class="btn">ADD Info</button>
			</div>
			<p class="login-register-text">Back to menu <a href="adminDescriptionInfo.php">Info</a>.</p>
		</form>
	</div>
</body>
</html>