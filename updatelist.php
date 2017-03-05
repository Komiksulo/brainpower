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
	$image = $_POST['hiddenimage'];
	if(isset($_FILES)){
		if(isset($_FILES['image']) && $_files['image']['name'] != ""){
			$file = $_FILES['image'];
			rename($file['tmp_name'], $path.$file['name']);
			$image = $file['name'];
		}
		$video = "";
		if(isset($_FILES['video'])){
			$file = $_FILES['video'];
			rename($file['tmp_name'], $path.$file['name']);
			$video = $file['name'];
		}
		$audio = "";
		if(isset($_FILES['audio'])){
			$file = $_FILES['audio'];
			rename($file['tmp_name'], $path.$file['name']);
			$audio = $file['name'];
		}
	}

	$sql = "update lists (name, description, image, audio, video, parent) values('".$_POST['name']."', '".$_POST['description']."', '".$image."', '".$audio."', '".$video."', ".$_POST['parent'].")";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('Location: '."caregiver.html");
?>