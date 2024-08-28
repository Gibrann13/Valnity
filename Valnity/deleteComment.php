<?php
	include 'config.php';
	
	$q = $_GET["q"];
	$sql = "DELETE FROM comment WHERE idComment=$q";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('comment deleted successfully')</script>";
	} else {
		echo "<script>alert('Error deleting record: " . $conn->error ."')</script>";
	}
	mysqli_close($conn);
	header("location: adminTopic.php");
?>