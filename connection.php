<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jobsearch";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if($conn){
		echo "";
	}
	else{
		die("Connection is Failed Because".mysqli_connect_error());
	}
?>