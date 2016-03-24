<?php
	$patientData = $_SESSION[userData];
	print "
		<div class='patientInfo'>
			<img  class='patientPhoto' src='../images/$patientData[Photo].'>
			<center><big><b>$patientData[First_Name] $patientData[Middle_Name] $patientData[Second_Name]</b></big></center><br><br>";
			if($patientData[Virus]) print "&#10003"; else print "&#10005";
		print "</div>
	";
?>