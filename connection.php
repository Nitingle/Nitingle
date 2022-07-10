<?php
error_reporting(1);

$con=mysqli_connect('localhost', 'root', '','poll_mysqli') or die(mysqli_error());
$db_select_query=mysqli_select_db($con,'poll_mysqli') or die(mysqli_error());

?>
