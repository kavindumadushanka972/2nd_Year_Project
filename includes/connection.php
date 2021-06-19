<?php

	$servername = "localhost";
	$database = "fertilizer_management";
	$username = "root";
	$password = "dl1842625ca#";

	// Create connection

	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection

	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_errno());
	}

	//echo "Connected successfully";

	//mysqli_close($conn);

/*
	$mysqli = mysqli_connect("localhost", "root", "dl1842625ca#", "fertilizer_management");
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	echo $mysqli->host_info . "\n";
*/	
?>


