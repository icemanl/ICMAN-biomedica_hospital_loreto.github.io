<?php
function conectarse(){
	$servername = "localhost";
	$username = "root";
	$password = "Azteca900";
	$dbname = "productos";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    	die("Connection failed: ".$conn->connect_error);
	} 
	return $conn;
}
?>