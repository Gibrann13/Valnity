<?php 

	session_start();

	if($_SESSION['level']==""){
		header("Location: index.php");
	}
	

?>
<html>
	<head>
		<link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Style/homeStyle.css" rel="stylesheet">
		<link href="Style/header.css" rel="stylesheet">
		
		<script>
			//buat tambahin/hapus class responsive
			function myFunction() {
				var x = document.getElementById("myMenu");
				if (x.className === "menu") {
					x.className += " responsive";
				} else {
					x.className = "menu";
				}
			}
		</script>
	</head>
	<body>
		<nav class="header">
			<div class="logo">
				<a href="home.php"><img src="image/logovc.png"></img></a>
			</div>
			<div class="menu" id="myMenu">
				<ul class="active">
					<li><a href="topicPage.php">TOPIC PAGE</a></li>
					<li><a href="descriptionInfo.php">DESCRIPTION INFO</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
				<a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</nav>
		<div class="body">
			<h1>WELCOME TO VALNITY</h1>
			<P>VALNITY is a website for valorant community to discuss about the update, the tournament and everything about valorant.</P>
			<div id="container">
				<div class="box">
				<a href="topicPage.php">
					<button class="primary" type="button">
						<div class="label">
							<span class="hover-effect"></span>
							<span class="label-text">START</span>
						</div>
					</button>
				</a>
				</div>
			</div>
		</div>
	</body>
</html>