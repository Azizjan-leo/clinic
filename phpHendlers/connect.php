<?php
	session_start();
	//mysql_connect ("localhost","root","123") or die(mysql_error());
	//mysql_query("set names utf8");
	//mysql_query("set character_set_server=utf8");
    //mysql_select_db ("system")or die(mysql_error());
	$mysqli = new mysqli("localhost", "root", "123", "system");
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
?>