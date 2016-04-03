<?php
if(isset($_GET[id]))
	$con = mysqli_connect("localhost", "root", "123", "system");
	$con->query("DELETE FROM `Emp_comments` WHERE Emp_comments_ID = '".$_GET[id]."'");
	print "<script type='text/javascript'>window.location.href='../index.php?doctor=$_GET[from]'</script>";
?>