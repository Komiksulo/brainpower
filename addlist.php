<?php

	$servername = "localhost";
	$username = "root";
	if(strpos($server_agent, "Darwin") !== FALSE){
		$password = "F3ckth1s";
	} else {
		$password = "f3b3cd0fd85768c63c0ec83bd75429202701e9703a002da0";
	}
	$conn = mysqli_connect($servername, $username, $password);
	$sql = "INSERT INTO lists (name, description, image, audio, video, parent) values($_GET['name'], $_GET['description'], $_GET['image'], $_GET['audio'], $_GET['video'], $_GET['parent'])";
	mysqli_query($conn, $sql);
	mysqli_close($conn);

?>