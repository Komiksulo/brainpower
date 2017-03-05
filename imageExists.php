<?php
echo(json_encode(file_exists("img/".$_GET['id'].".png")));
?>