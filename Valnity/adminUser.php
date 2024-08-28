<html>
	<head>
		<link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
		<link href="Style/header.css" rel="stylesheet">
		<link href="Style/styleAdminUser.css" rel="stylesheet">
		
		<script>
			function myFunction() {
				var x = document.getElementById("myMenu");
				if (x.className === "menu") {
					x.className += " responsive";
				} else {
					x.className = "menu";
				}
			}
			
			function showHint(str) {
				if(str.length == 0) {
					document.getElementById("txtHint").innerHTML = "";
					return;
				}
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				}else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "showHint.php?q=" + str, true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<nav class="header">
			<div class="logo">
				<a href="adminTopic.php"><img src="image/logovc.png"></img></a>
			</div>
			<div class="menu" id="myMenu">
				<ul class="active">
					<li><a href="adminTopic.php">TOPIC PAGE</a></li>
					<li><a href="adminDescriptionInfo.php">DESCRIPTION INFO</a></li>
					<li><a href="adminUser.php">USER</a></li>
					<li><a href="adminRegister.php">NEW ADMIN</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
				<a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</nav>
		<div>
			<div class="search-box">
				<div>
				<form>
					<input type="text" name="q" placeholder="search name ..." onkeyup="showHint(this.value)">
					<button><i class="fa fa-search"></i></button>
				</form>
				</div>
			</div>
		</div>
		<div id="txtHint">
			<div class="tab" id="tab">
			<?php
				include('config.php');
	
				$sql = "SELECT * FROM users";
				$var = mysqli_query($conn, $sql);
	
				$data = "<table><tr><th>Name</th><th>Email</th><th>Level</th><th></th></tr>";
				$userId;
				while($row = mysqli_fetch_array($var)) {
					$userId = $row['id'];
					$delname = "deleteUser.php?q=$userId";
					$data .= "<tr><td>". $row['username'] ."</td><td>". $row['email'] ."</td><td>". $row['level'] ."</td><td><a href='$delname'>DELETE</a></td></tr>";
				}
				$data .= "</table>";
				echo $data;
			?>
			</div>
		</div>
	</body>
</html>