<?php
	session_start();
	$mysqli	= mysqli_connect("localhost", "root", "123", "system");
	if(mysqli_connect_errno()){
		echo $mysqli_connect_error();
		exit();
	}
	

//$link = mysqli_connect("localhost", "root", "123", "system");
/*
if (!$link) {
    echo "\nError: Unable to connect to MySQL." . PHP_EOL;
    echo "\nDebugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "\nDebugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);*/
/*
$mysqli = @new mysqli("localhost", "root", "123", "system");

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno);
}*/
?>
