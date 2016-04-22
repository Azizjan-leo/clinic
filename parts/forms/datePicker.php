<?php
print "
	<input id='arrow-left' type='image' src='images/arrow-left.ico' onClick='onClick($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], -1);'>
	<div id='datePicker'></div>
	<input id='arrow-right' type='image' src='images/arrow-right.ico' onClick='onClick($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], 1);'>
	<br>
	<div id='timePicker'></div>
	<br>
	<div id='ordConfirm'></div>";