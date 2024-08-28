<?php
	session_start();

	if (!isset($_SESSION['level'])) {
		header("Location: index.php");
	}
?>

<html>
	<head>
		<link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
		<link href="Style/header.css" rel="stylesheet">
		<link href="Style/styleDiscussion.css" rel="stylesheet">

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
			//Comment
			function showComment(){
				var commentArea = document.getElementById("comment-area");
				if (commentArea.className === "comment-area"){
					commentArea.className += " hide";
				}else {
					commentArea.classList.remove("hide");
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
	
		<div class="container">
			<!--Topic Section-->
			<div class="topic-container">
				<!--Original thread-->
				<div class="head">
					<div class="authors">Topic</div>
				</div>
				<?php
					include'config.php';
					$q = $_GET["q"];
					$sqlTopic = "SELECT * FROM topic";
					$varTopic = mysqli_query($conn, $sqlTopic);
					$tPicture;
					$tJudul;
					$tDesc;
					$tDate;
					while($row = mysqli_fetch_array($varTopic)){
						if($q === $row['idTopic']){
							$tPicture = $row['picture'];
							$tJudul = $row['judul'];
							$tDesc = $row['deskripsi'];
							$tDate = $row['postDate'];
						}
					}
					echo "<div class='body'>
						<div class='authors'>
							<img src='image/$tPicture' alt=''>
						</div>
						<div class='content'>
							<h2>$tJudul</h2>$tDesc
							<div class='comment'>
								<button onclick='showComment()'>Comment</button>
							</div>
						</div>
					</div>";
				?>
			</div>
			
			<div class="comment-area hide" id="comment-area">
				<form method="post">
					<textarea name="comment" placeholder="comment here ... "></textarea>
					<input type="submit" value="submit">
				</form>
			</div>
			
			<?php
				
				$sqlComment = "SELECT * FROM comment";
				$varComment = mysqli_query($conn, $sqlComment);
				
				$data = "<div class='topic-container comment'><div class='head'><div class='authors'>COMMENT</div></div>";
				
				while($arr = mysqli_fetch_array($varComment)) {
					if($q === $arr['idTopic']) {
						$sqlUser = "SELECT * FROM users";
						$varUser = mysqli_query($conn, $sqlUser);
						while($arrUser = mysqli_fetch_array($varUser)) {
							if($arrUser['id'] === $arr['idUser']) {
								$data .= "<div class='comments-container'>
									<div class='body'>
										<div class='authors'>
											<div class='username'><a href=''>". $arrUser['username'] ."</a></div>
											<div>". $arrUser['email'] ."</div>
											<div>". $arr['commentTime'] ."</div>
										</div>
										<div class='content'>
											". $arr['userComment'] ."
										</div>
									</div>
								</div>";
							}
						}
					}
				}
				$data .= "</div>";
				echo $data;
			?>
		</div>
		<?php
			if(isset($_POST['comment'])) {
				$com = $_POST['comment'];
				$sqlUser = "SELECT * FROM users";
				$varUser = mysqli_query($conn, $sqlUser);
				$userId;
				while($arrUser = mysqli_fetch_array($varUser)){
					if($_SESSION['username'] === $arrUser['username']){
						$userId = $arrUser['id'];
					}
				}
		
				$insert = "INSERT INTO comment(idTopic, idUser, userComment)
					VALUE('$q', '$userId', '$com')";
				mysqli_query($conn, $insert);
				header('location: topicPage.php');
			}
		?>
	</body>
</html>