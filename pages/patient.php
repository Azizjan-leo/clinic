<?php
	if($_GET[patient] == 'all')
		echo '<br>Patients<br>';
	else
		echo '<br>Patient<br>';
	/*
		<form method="post">
		<input type="text" name="name" maxlength="30" placeholder="Name" size="30" required /><br>
		<input type="text" name="middle" maxlength="30" placeholder="Middle name" size="30" /><br>
		<input type="text" name="surname" maxlength="30" placeholder="Surname" size="30" required /><br>
		Birth date<br>
		<input type="date" name="date" required /><br>
		<input type="text" name="cardId" maxlength="11" required><br>
		<select>
			<option value='0' disabled selected style='display:none;'>M</option>
			<option value='1'>W</option>
		</select>
		<select name="prof">
			<?php$sql = mysql_query("SELECT Name FROM Staff"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['Name'].">" . $row['Name'] . "</option>";} ?>
		</select><br>
	*/
?>