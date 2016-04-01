<?php
	if($_SESSION["check"])
	{
		$_SESSION["check"] = $_SESSION["systAccess"] = $_SESSION['log'] = False;
		$_SESSION[userName] = $_SESSION["class"] = False;
		print '<script type="text/javascript">window.location.href="../index.php"</script>';
	}
	else
		print '<script type="text/javascript">window.location.href="../index.php"</script>';
?>