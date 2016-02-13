<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("system")or die(mysql_error());
	if(isset($_GET['action'])){
		if($_GET['action'] == "in"){
			$_SESSION['systAccess'] = $_SESSION['log'] = true;
			$_SESSION["check"] = $_SESSION['systAccess'] = true;
			header("Location: http://clinic:82/index.php");
			die();
			//session_destroy(); //?! Uninitialized session ?!
		}
	}
	if(isset($_GET['action'])){
		if($_GET['action'] == "out"){
			unset($_SESSON['name']);
			$_SESSION['systAccess'] = FALSE;
			$_SESSION["check"] = $_SESSION['systAccess'] = $_SESSION['log'] = false;
			unset($_SESSION['log']);
			header("Location: http://clinic:82/index.php");
			die();
			//session_destroy(); //?! Uninitialized session ?!
		}
	}
?>