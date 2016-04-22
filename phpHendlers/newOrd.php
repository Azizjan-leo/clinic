<?php
	if(isset($_GET[dateTime])){
		$mysqli = new mysqli('localhost', 'root', '123', 'system');
		
		if ($mysqli->connect_errno) {
			
			echo "Sorry, this website is experiencing problems.";
			
			echo "Error: Failed to make a MySQL connection, here is why: \n";
			echo "Errno: " . $mysqli->connect_errno . "\n";
			echo "Error: " . $mysqli->connect_error . "\n";
			
			exit;
		}
		if($_GET[PatientId])
			$pId = $_GET[PatientId];
		else $pId = 'NULL';
		if($_GET[UnregVisitorId])
			$uvId = $_GET[UnregVisitorId];
		else $uvId = 'NULL';
		$sql = "INSERT INTO `system`.`Ord` (`Id`, `DoctorId`, `PatientId`, `UnregVisitorId`, `DateTime`) VALUES (NULL, '$_GET[Emp_ID]', $pId, $uvId, '$_GET[dateTime]')";
		if (!$result = $mysqli->query($sql)) {
			
			echo "Sorry, the website is experiencing problems. <br>";

			echo "Error: Our query failed to execute and here is why: <br>";
			echo "Query: " . $sql . "<br>";
			echo "Errno: " . $mysqli->errno . "<br>";
			echo "Error: " . $mysqli->error . "<br>";
			exit;
		}
		print "<script type='text/javascript'>window.location.href='../index.php?doctor=$_GET[Emp_ID]'</script>";
	}
?>