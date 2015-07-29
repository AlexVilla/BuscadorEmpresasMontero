<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_montero_puntuacion";

	$connect = new mysqli($host,$user,$pass,$db) or die("error" . mysqli_errno($connect));
?>