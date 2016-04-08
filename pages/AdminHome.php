<?php if(!$_SESSION['log']) print '<script type="text/javascript">window.location.href="../index.php"</script>'; ?>
<?php
	print '
		<table>
			<tr>
				<td class="homeAction">
					';
	if(isset($_GET[massage])){
		if($_GET[massage] == "NewId"){
			$id = $_GET[NewId]; 
			echo "<p style='color: green'>New entry has been added</p>
			<big>ID: <textarea cols='11' rows='1'>$id</textarea><br><br>";
		}
	}
	
	if(isset($_POST[newEmployeeForm])){
		print '
			<form enctype="multipart/form-data" accept-charset="utf8_general_ci" name="emp" method="post" action="../phpHendlers/forms.php">
				<select name="userClass" required>';
					$sql = $mysqli->query("SELECT * FROM UserClasses"); while ($row = $sql->fetch_array(MYSQLI_ASSOC)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
					print '
				</select><br>
				<input type="text" name="name" maxlength="30" placeholder="Name" size="30"  required /><br>
				<input type="text" name="surname" maxlength="25" placeholder="Second Name" size="30"  required /><br>
				<input type="text" name="middle_name" maxlength="30" placeholder="Middle name" size="30" required /><br>
				Receipt date <input type="date" name="date"  required/><br>
				<select name="prof">';
					$sql = $mysqli->query("SELECT * FROM Staff"); while ($row = $sql->fetch_array(MYSQLI_ASSOC)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
					print '
				</select><br>
				Carier start <input type="date" name="carierStart"  required/><br>
				Category: <select name="category">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select><br>
				<input type="text" name="phone_num" maxlength="15" placeholder="Telephone" size="30" required /><br>
				<input type="text" name="passport_data" placeholder="Passport data" required /><br>
				<textarea cols="50" rows="10" name="curriculumVitae" placeholder="Curriculum vitae" required></textarea><br>
				<input type="file" name="image" value="Image" multiple accept="image/*" required></br>
				<input type="submit" name="newEmployeeFormSubmit" value="Enter">
			</form>';
	}
	
	print '
				</td>
				<td class="homeMenu">
					<form method="POST">
						<input class="homeMenuButton" type="submit"	 name="newEmployeeForm" value="Employee+">
					</form>
				</td>
			</tr>
		</table>
	';
?>