<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$mysqli = new mysqli('localhost', 'root', '123', 'system');
		echo "<br><br>" . $time = date("h:i:s", $_POST['time']) . "<br><br>";
		$time = date("H:i:s", $_POST['time']);
		echo "$_POST[time]<br>$time<br>";
		$res = $mysqli->query("INSERT INTO `system`.`Ord` (`Id`, `DoctorId`, `PatientId`, `UnregVisitorId`, `Date`, `Time`) VALUES (NULL, '$_POST[Emp_ID]', $_POST[patientId], $_POST[unregVisitorId], '".date('o-n-d', $_POST['date'])."', '$time')");
		if (!$res) {
   printf("Errormessage: %s\n", $mysqli->error);
}
	}
?>