<?php
	include 'config.php';
	
	$q = $_GET["q"];
	$sql = "DELETE FROM topic WHERE idTopic=$q";
	$sqlCom = "DELETE FROM comment WHERE idTopic=$q";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('topic deleted successfully')</script>";
	} else {
		echo "<script>alert('topic deleting record: " . $conn->error ."')</script>";
	}
	
	if ($conn->query($sqlCom) === TRUE) {
		echo "<script>alert('comment deleted successfully')</script>";
	} else {
		echo "<script>alert('Error deleting record: " . $conn->error ."')</script>";
	}
	mysqli_close($conn);
	header("location: adminTopic.php");
?>