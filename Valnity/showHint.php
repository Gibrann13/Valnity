<?php
	include('config.php');
	
	$sql = "SELECT * FROM users";
	$var = mysqli_query($conn, $sql);
	$data = array();
	$email = array();
	$level = array();
	$userId = array();
	
	while($row = mysqli_fetch_array($var)) {
		array_push($data, $row['username']);
		array_push($email, $row['email']);
		array_push($level, $row['level']);
		array_push($userId, $row['id']);
	}
	
	$q = $_GET["q"];
	
	if(strlen($q) > 0) {
		$hint = "<table><tr><th>Name</th><th>Email</th><th>Level</th><th></th></tr>";
		for($i = 0; $i< count($data); $i++) {
			if(strtolower($q) == strtolower(substr($data[$i],0,strlen($q)))) {
				$hint .= "<tr><td>$data[$i]</td><td>$email[$i]</td><td>$level[$i]</td><td><a href='deleteUser.php?q=$userId[$i]'>DELETE</a></td></tr>";
			}
		}
		$hint .= "</table>";
	}
	if($hint == "") {
		$response = "no suggestion";
	}else {
		$response = $hint;
	}
	echo $response;
	mysqli_close($conn);
?>