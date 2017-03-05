<?php
	$servername = "localhost";
	$username = "root";
	$server_agent = php_uname();
	if(strpos($server_agent, "Darwin") !== FALSE){
		$password = "root";
		$path = "/Applications/MAMP/htdocs/brainpower/img/";
	} else {
		$password = "f3b3cd0fd85768c63c0ec83bd75429202701e9703a002da0";
		$path = "/var/www/html/img/";
	}
	$conn = mysqli_connect($servername, $username, $password, "mysql");
	$sql = "update listsEvent set done = 'done' where id = '".$_GET['id']."' ";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('Location: '."caregiver.html");
?>