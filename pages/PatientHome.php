<?php
	$sql = $mysqli->query("SELECT * FROM `patients` WHERE ID = ".$_SESSION[userData][ID]); 
	$patientData = $sql->fetch_array(MYSQLI_ASSOC);
	print "
		<div class='patient_home'>
			<center><big><b>$patientData[First_Name] $patientData[Middle_Name] $patientData[Second_Name]</b></big></center><br>
			<img  class='patient_photo' src='../images/$patientData[Photo].'>
			<div class='patient_info'>
				<table class='brd' id='textCenter'>
						<tr><td>Patient Info</td></tr>
						<tr><td>Patient Info</td></tr>
						<tr><td>Patient Info</td></tr>
						<tr><td>Patient Info</td></tr>
				</table>
			</div>
		</div>
	";
?>