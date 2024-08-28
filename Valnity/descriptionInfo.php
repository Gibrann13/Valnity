<html>
	<head>
		<link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="Style/header.css" rel="stylesheet">
		<link href="Style/StyleDescriptionInfo.css" rel="stylesheet">
		
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
			
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.open("GET", "info.xml", false);
			xmlhttp.send();
			xmlDoc = xmlhttp.responseXML;
			
			x = xmlDoc.getElementsByTagName("agent")
			i = 0;
			y = xmlDoc.getElementsByTagName("weapon")
			j = 0;
			z = xmlDoc.getElementsByTagName("map")
			k = 0;
			
			function displayInfo() {
				name = (x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue);
				role = (x[i].getElementsByTagName("role")[0].childNodes[0].nodeValue);
				desc = (x[i].getElementsByTagName("desc")[0].childNodes[0].nodeValue);
				type = (x[i].getElementsByTagName("type")[0].childNodes[0].nodeValue);
				picture = (x[i].getElementsByTagName("picture")[0].childNodes[0].nodeValue);
				txt = "<img src='image/info/" + picture + "'><h2>" + name + "</h2><p>// ROLE<br><b>" + role + "</b></p><p>" + desc + "</p>";
				document.getElementById("showAgent").innerHTML= txt;
				
				name = (y[j].getElementsByTagName("name")[0].childNodes[0].nodeValue);
				role = (y[j].getElementsByTagName("role")[0].childNodes[0].nodeValue);
				desc = (y[j].getElementsByTagName("desc")[0].childNodes[0].nodeValue);
				type = (y[j].getElementsByTagName("type")[0].childNodes[0].nodeValue);
				picture = (y[j].getElementsByTagName("picture")[0].childNodes[0].nodeValue);
				txt1 = "<img src='image/info/" + picture + "'><h2>" + name + "</h2><p>// ROLE<br><b>" + role + "</b></p><p>" + desc + "</p>";
				document.getElementById("showWeapon").innerHTML= txt1;
				
				name = (z[k].getElementsByTagName("name")[0].childNodes[0].nodeValue);
				desc = (z[k].getElementsByTagName("desc")[0].childNodes[0].nodeValue);
				type = (z[k].getElementsByTagName("type")[0].childNodes[0].nodeValue);
				picture = (z[k].getElementsByTagName("picture")[0].childNodes[0].nodeValue);
				txt2 = "<img src='image/info/" + picture + "'><h2>" + name + "</h2><p>" + desc + "</p>";
				document.getElementById("showMap").innerHTML= txt2;
			}
			
			function prev() {
				if(i>0) {
					i--;
					displayInfo();
				}
			}
			
			function next() {
				if(i<x.length-1) {
					i++;
					displayInfo();
				}
			}
			
			function prev1() {
				if(j>0) {
					j--;
					displayInfo();
				}
			}
			
			function next1() {
				if(j<x.length-1) {
					j++;
					displayInfo();
				}
			}
			
			function prev2() {
				if(k>0) {
					k--;
					displayInfo();
				}
			}
			
			function next2() {
				if(k<x.length-1) {
					k++;
					displayInfo();
				}
			}
		</script>
	</head>
	<body onload="displayInfo()">
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
		
		<div class="info">
			<div id="showAgent"></div><br>
			<input type="button" onclick="prev()" value="<<">
			<input type="button" onclick="next()" value=">>">
		</div>
		<div class="info">
			<div id="showWeapon"></div><br>
			<input type="button" onclick="prev1()" value="<<">
			<input type="button" onclick="next1()" value=">>">
		</div>
		<div class="info">
			<div id="showMap"></div><br>
			<input type="button" onclick="prev2()" value="<<">
			<input type="button" onclick="next2()" value=">>">
		</div>
	</body>
</html>