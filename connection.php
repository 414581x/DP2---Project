<?php
  

	$servername = "localhost";
	$username = "dp2";
	$password = "phpdp2";
	$dbname = "dp2php";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
		if ($conn === false) {
			die("Connection failed: " . $conn->connect_error);
		}

	

?> 