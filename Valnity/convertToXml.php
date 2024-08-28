<?php
	include('config.php');
	
	$sql = "SELECT * FROM info";
	$var = mysqli_query($conn, $sql);
	$data = "<info>";
	while($arr = mysqli_fetch_array($var)){
		if($arr['type'] === "agent") {
			$data .= "<agent>";
			$data .= "<name>". $arr['name']. "</name>";
			$data .= "<role>". $arr['role']. "</role>";
			$data .= "<desc>". $arr['descr']. "</desc>";
			$data .= "<type>". $arr['type']. "</type>";
			$data .= "<picture>". $arr['picture']. "</picture>";
			$data .= "</agent>";
		}else if($arr['type'] === "weapon") {
			$data .= "<weapon>";
			$data .= "<name>". $arr['name']. "</name>";
			$data .= "<role>". $arr['role']. "</role>";
			$data .= "<desc>". $arr['descr']. "</desc>";
			$data .= "<type>". $arr['type']. "</type>";
			$data .= "<picture>". $arr['picture']. "</picture>";
			$data .= "</weapon>";
		}else {
			$data .= "<map>";
			$data .= "<name>". $arr['name']. "</name>";
			$data .= "<desc>". $arr['descr']. "</desc>";
			$data .= "<type>". $arr['type']. "</type>";
			$data .= "<picture>". $arr['picture']. "</picture>";
			$data .= "</map>";
		}
		
	}
	$data .= "</info>";
	$x = new SimpleXMLElement($data);
	$x->asXML("info.xml");
	mysqli_close($conn);
	
	header("location: adminDescriptionInfo.php");
?>