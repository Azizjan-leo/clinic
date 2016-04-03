<?php
	session_start();
	$mysqli	= mysqli_connect("localhost", "root", "123", "system");
	if(mysqli_connect_errno()){
		echo $mysqli_connect_error();
		exit();
	}
?>