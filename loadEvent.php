<?php
$eventId = $_GET['id'];
$servername = "localhost";
$username = "root";
$server_agent = php_uname();
if(strpos($server_agent, "Darwin") !== FALSE){
	$password = "root";
} else {
	$password = "f3b3cd0fd85768c63c0ec83bd75429202701e9703a002da0";
}
$conn = mysqli_connect($servername, $username, $password, "mysql");
if($eventId == -1){
	$sql = "SELECT * FROM lists";
} else {
	$sql = "SELECT * FROM lists where id = ".$eventId;
}
$resultQuery = mysqli_query($conn, $sql);
$results = [];
while ($row = $resultQuery->fetch_object()){
	$result = [];
	$result['name'] = $row->name;
	$result['description'] = $row->description;
	$result['video'] = $row->video;
	$result['image'] = $row->image;
	$result['audio'] = $row->audio;
	$result['parent'] = $row->parent;
	$result['time'] = "4:00 PM";
	$result['date'] = "March 5, 2017";
	$result['id'] = $row->id;
	$results[] = $result;
}
echo(json_encode($results));
mysqli_close($conn);
?>