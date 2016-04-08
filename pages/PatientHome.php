<?php
	$patientData = $_SESSION[userData];
	print "
		<div class='patient_home'>
			<center><big><b>$patientData[First_Name] $patientData[Middle_Name] $patientData[Second_Name]</b></big></center><br>
			<img  class='patient_photo' src='../images/$patientData[Photo].'>";
		print "</div>
	";
?>