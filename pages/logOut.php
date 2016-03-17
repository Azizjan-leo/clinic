<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character_set_server=utf8");
    mysql_select_db ("system")or die(mysql_error());
	if($_SESSION["check"])
	{
		$_SESSION["check"] = $_SESSION["systAccess"] = $_SESSION['log'] = False;
		$_SESSION[userName] = $_SESSION["class"] = False;
		print '<script type="text/javascript">window.location.href="../index.php"</script>';
	}
	else
		print '<script type="text/javascript">window.location.href="../index.php"</script>';
?>