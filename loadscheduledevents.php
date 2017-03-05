<?php
$servername = "localhost";
$username = "root";
$server_agent = php_uname();
if(strpos($server_agent, "Darwin") !== FALSE){
	$password = "root";
} else {
	$password = "f3b3cd0fd85768c63c0ec83bd75429202701e9703a002da0";
}
$conn = mysqli_connect($servername, $username, $password, "mysql");

$sql = "SELECT listsevent.id as listeventid, lists.id as id, name, description, image, video, audio, date, time, done, help FROM listsevent join lists on listid = lists.id where done is null order by time, date";
var_dump($sql);
$resultQuery = mysqli_query($conn, $sql);
$results = [];
while ($row = $resultQuery->fetch_object()){
	$result = [];
	$result['id'] = $row->id;
	$result['listeventid'] = $row->listeventid;
	$result['name'] = $row->name;
	$result['description'] = $row->description;
	$result['image'] = $row->image;
	$result['video'] = $row->video;
	$result['audio'] = $row->audio;
	$result['date'] = $row->date;
	$result['time'] = $row->time;
	$result['done'] = $row->done;
	$result['help'] = $row->help;
	$results[] = $result;
}
echo(json_encode($results));
mysqli_close($conn);
?>