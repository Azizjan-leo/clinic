<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("system")or die(mysql_error());
	if(isset($_GET['action'])){
		if($_GET['action'] == "out"){
			unset($_SESSON['name']);
			$_SESSION['systAccess'] = FALSE;
			session_unset();
			$_SESSION["check"] = $_SESSION['systAccess'] = false;
			header("Location: http://clinic:82/index.php");
			die();
			//session_destroy(); //?! Uninitialized session ?!
		}
	}
?>