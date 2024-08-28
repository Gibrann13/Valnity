<?php 

 $conn = mysqli_connect('localhost', 'root', '', 'form');

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>