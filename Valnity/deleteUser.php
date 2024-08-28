<?php
	include 'config.php';
	
	$q = $_GET["q"];
	$sql = "DELETE FROM users WHERE id=$q";
	$sqlCom = "DELETE FROM comment WHERE idUser=$q";
	if ($conn->query($sql) === TRUE && $conn->query($sqlCom) === TRUE) {
		echo "<script>alert('user deleted successfully')</script>";
	} else {
		echo "<script>alert('Error deleting record: " . $conn->error ."')</script>";
	}
	mysqli_close($conn);
	header("location: adminUser.php");
?>