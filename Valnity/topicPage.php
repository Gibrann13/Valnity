<html>
	<head>
		<link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="Style/StyleTopicPage.css" rel="stylesheet">
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
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
				<a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</nav>
		
		<?php
			include'config.php';
			$sql = "SELECT * FROM topic";
			$var = mysqli_query($conn, $sql);
			
			
			$data = "<div class='container'><div class='subforum'><div class='subforum-title'><h1>TOPIC PAGE</h1></div>";
			while($arr = mysqli_fetch_array($var)) {
				$idtopic = $arr['idTopic'];
				$sqlComment = "SELECT * FROM comment";
				$varComment = mysqli_query($conn, $sqlComment);
				$totalComment = 0;
				while($arrComment = mysqli_fetch_array($varComment)) {
					if($arrComment['idTopic'] === $idtopic) {
						$totalComment += 1;
					}
				}
				
				$getName = "discussion.php?q=$idtopic";
				$data .= "<div class='subforum-row'>
					<div class='subforum-icon subforum-column center'>
						<img src='image/". $arr['picture'] ."'></img>
					</div>
					<div class='subforum-description subforum-column'>
						<h4><a href='$getName'>". $arr['judul'] ."</a></h4>
						<p>". $arr['deskripsi'] ."</p>
					</div>
					<div class='subforum-stats subforum-column center'>
						<span>". $totalComment ." Comment</span>
					</div>
					<div class='subforum-info subforum-column center'>
						<span>Post on ". $arr['postDate'] ."</span>
					</div>
				</div>";
			}
			$data .= "</div></div>";
			echo $data;
		?>
	</body>
</html>	
