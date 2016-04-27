<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$mysqli = new mysqli('localhost', 'root', '123', 'system');
		$res = $mysqli->query("INSERT INTO `system`.`Ord` (`Id`, `DoctorId`, `PatientId`, `UnregVisitorId`, `Date`, `Time`) VALUES (NULL, '$_POST[Emp_ID]', $_POST[patientId], $_POST[unregVisitorId], '".date('o-n-d', $_POST['date'])."', '".date("H:i", $_POST['time'])."')");
		if (!$res) {
			printf("Errormessage: %s\n", $mysqli->error);
		}
	}
?>