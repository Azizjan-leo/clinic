<?php
//file with sql query
include "data.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Calendar</title>
  <link rel="stylesheet" href="styles/jquery-ui.css">
		<link rel="stylesheet" href="styles/jquery.timepicker.css">
  <script src="scripts/jquery-1.10.2.js"></script>
		<script>
		//get variable in js
		//json_encode for array
		var disableddates = <?php echo json_encode($sqlArr); ?>;
		var weekdays = <?php echo json_encode($sqlDays); ?>;
		var uTime = <?php echo json_encode($sqlTime); ?>;
		</script>
  <script src="scripts/scripts.js"></script>
  <script src="scripts/jquery-ui.js"></script>
		<script src="scripts/jquery.timepicker.min.js"></script>
</head>
<body>
 <!--calendar-->
 <p>Date: <input type="text" id="datepicker" />
	<input id="timeformatExample1" type="text" class="time ui-timepicker-input" autocomplete="off">
	</p>
	<input type="button" value="poke" onClick="test();" />
</body>
</html>