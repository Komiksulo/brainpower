<?php
$img = $_REQUEST['data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$id = uniqid();
$server_agent = php_uname();
if(strpos($server_agent, "Darwin") !== FALSE){
	$path = "/Applications/MAMP/htdocs/brainpower/img/";
} else {
	$path = "/var/www/html/img/";
}
file_put_contents($path. $id .'.png', base64_decode($img));
?>