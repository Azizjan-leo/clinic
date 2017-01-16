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
	if (isset($_POST['Submit1'])) {

		$selected_radio = $_POST['interfase_style'];

		switch ($selected_radio) {
    case 1:
        echo "<body style='background-color:orange ; font-size: 15'>";
		$lang = "eng";
        break;
    case 2:
        echo "<body style='background-color:white; font-size: 20'>";
		$lang = "eng";
        break;
    case 3:
        $lang = "ru";
		echo "<body style='background-color:red; font-size: 15'>";
        break;


	}
	}
	print '
				</td>
				<p>'; if($lang == "ru") echo "бла бла бла"; else print 
				'bla bla bla';
				print '</p>
				
					<br>
					<form name="interface_change" method="POST">
						<Input type = "radio" Name = "interfase_style" value= "1">OrengeNormal
						<br>
						<Input type = "radio" Name = "interfase_style" value= "2">WhiteBig
						<br>
						<Input type = "radio" Name = "interfase_style" value= "3">RuRedNormal
						<br>
						<Input type = "Submit" Name = "Submit1" VALUE = "'; if($lang == "ru") echo 'Применить"'; else echo 'ok"';
						print '>
				</td>
			</tr>
		</table>
	';
	/*<td class="homeMenu">
					<form name="actions" method="POST">
						<input class="homeMenuButton" type="submit"	 name="newEmployeeForm" value="Employee+">
					</form>*/
?>