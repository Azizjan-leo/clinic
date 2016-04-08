<?php
	if($_SESSION['class'] != 2)print "<script type='text/javascript'>window.location.href='../index.php'</script>";
	
	// LIST OF ALL PATIENTS OF THE CLINIC
	
	if($_GET[patient] == 'all'){
			$result = $mysqli->query("SELECT ID FROM patients");
			/* determine number of rows result set */
			echo "
		<div class='patientsList'>
			<div id='title'><big><b>All patients</b></big></div> <div id='total'> Total: <b>$result->num_rows</b> </div><br><br>";
			$query = $mysqli->query("SELECT * FROM patients");
			while($row = $query->fetch_array(MYSQLI_ASSOC)){
				echo "<center> <a href='../index.php?patient=$row[ID]'>$row[First_Name] $row[Middle_Name] $row[Second_Name]</a> </center><br>";
			}
			echo "
		</div>";
		$result->close();
		
	}else{
		
	// PARTICULAR PATIENT
	
		$query = $mysqli->query("SELECT * FROM patients WHERE ID = $_GET[patient]");
		$patientData = $query->fetch_array(MYSQLI_ASSOC);
		
		print "
				<div class='patient_info'>
					<div class='patient_photo'> 
						<img src='../images/$patientData[Photo]'>
					</div>
				</div>";
				
	}
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