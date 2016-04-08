<?
	$mysqli	= mysqli_connect("localhost", "root", "123", "system");
	
	if(isset($_POST[docComment])){
		$mysqli->query("INSERT INTO Emp_comments VALUES (NULL, '$_POST[docID]', '$_POST[patID]', CURRENT_TIMESTAMP, '$_POST[text]')") or die(mysql_error());
	}
	print '<script type="text/javascript">history.go(-1);</script>';
?>