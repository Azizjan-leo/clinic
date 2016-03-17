<?php if(!$_SESSION['log']) print '<script type="text/javascript">window.location.href="../index.php"</script>'; ?>
<?php
	print '
		<table>
			<tr>
				<td class="homeAction">
					';
	if(isset($_POST[newPatientFormSubmin])){
		$firstName = $_POST[First_Name];
		$middleName = $_POST[Middle_Name];
		$secondName = $_POST[Second_Name];
		$birthDate = $_POST[Birth_Date];
		$gender = $_POST[Gender];
		$insuranceCategory = $_POST[Insurance_Category];
		$diagnosis = $_POST[Diagnosis];
		$virus = $_POST[Virus];
		$receiptDate = date("Y-m-d");
		$prof = $_POST[Prof];
		$address = $_POST[Address];
		$phone = $_POST[Phone];
		$email = $_POST[Email];
		$comment = $_POST[Comment];
		$careDoctor = $_SESSION[userData][Emp_ID];
		$data = mysql_fetch_array(mysql_query("SELECT Id FROM Staff WHERE Name = '".$_SESSION[userData][Prof]."'"));
		$careDoctorProf = $data[Id];
		
		if ( $_FILES['image']['error'] == 0 ) {
			// Если файл загружен успешно, то читаем содержимое файла
			mysql_query("INSERT INTO Users VALUES(NULL, 4, NULL)") or die(mysql_error());
			$data = mysql_fetch_array(mysql_query("SELECT MAX(Id) AS Id FROM Users WHERE Class = 4"));
			$id = $data['Id'];
			$query="INSERT INTO patients VALUES('".$id."','".$firstName."','".$middleName."','".$secondName."','".$birthDate."', '".$gender."', '".$insuranceCategory."', '".$diagnosis."','".$virus."', '".$receiptDate."', '".$prof."', '".$address."', '".$phone."', '".$email."', '".$careDoctor."', '".$careDoctorProf."', '".$_FILES['image']['name']."', '".$comment."')";
			// После чего остается только выполнить данный запрос к базе данных
			if(mysql_query($query)){
				// Также отправляем картинку в папку unloaded_images
				if(move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name'])){
					$_SESSION[massage] = $id;
				}				
			}
		}
		else{
			echo '<p style="color: red">File loading error</p>';
		}
		
	}
	if(isset($_POST[newEmployeeFormSubmin])){
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$middle_name = $_POST['middle_name'];
		$date = $_POST['date'];
		$prof = $_POST['prof'];
		$phone_num = $_POST['phone_num'];
		$passport_data = $_POST['passport_data'];
		$carierStart = $_POST[carierStart];
		$category = $_POST[category];
		$class = $_POST[userClass];
			
		// Проверяем, что при загрузке не произошло ошибок
		if ( $_FILES['image']['error'] == 0 ) {
			// Формируем запрос на добавление файла в базу данных
			mysql_query("INSERT INTO Users VALUES(NULL, '".$class."', NULL)") or die(mysql_error());
			$data = mysql_fetch_array(mysql_query("SELECT MAX(Id) AS Id FROM Users WHERE Class = ".$class.""));
			$id = $data[Id];
			// После чего остается только выполнить данный запрос к базе данных
			if(mysql_query("INSERT INTO `Employee` VALUES('".$id."','".$class."','".$name."','".$surname."','".$middle_name."','".$prof."','".$carierStart."','".$category."','".$phone_num."','".$passport_data."','".$date."','".$_FILES['image']['name']."','".$_POST[curriculumVitae]."')")){
				if(move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name'])){
					$_SESSION[massage] = $id;
				}else{echo "can't move_uploaded_file";}
			}else{echo"can't insert into Employee";}			
		}else{echo "Image uploading error";}
	}	
	if($_SESSION[massage]){
		$id = $_SESSION[massage];
		echo "<p style='color: green'>New entry has been added</p>
		  <big>ID: <textarea cols='11' rows='1'>$id</textarea><br><br>";
		  $_SESSION[massage] = false;
	}
	function newPatientForm(){

		print '
			<form enctype="multipart/form-data" accept-charset="utf8" method="POST" name="newPatientForm">
				<input type="text" maxlength="30" name="First_Name" placeholder="First Name"  required/> <br>
				<input type="text" maxlength="30" name="Middle_Name" placeholder="Middle Name"  /> <br>
				<input type="text" maxlength="30" name="Second_Name" placeholder="Second Name"  required/> <br>
				Birth Date <input type="date" name="Birth_Date" style="width: 296px;" required/> <br>
				Man <input type="radio" name="Gender" value="1"> Woman<input type="radio" name="Gender" value="0"> <br>
				Virus <input type="checkbox" name="Virus" value="1" > <br>
				Insurance Category <select name="Insurance_Category"  style="width: 227px;" required><option value="0">None</option><option value="1">Invalid 1</option><option value="2">Invalid 2</option><option value="3">Invalid 3</option><option value="4">Pensioner</option><option value="5">Veteran</option></select><br>
				Diagnosis <select name="Diagnosis"  style="width: 297px;">'; $sql = mysql_query("SELECT * FROM Diagnosis"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['ID'].">" . $row['Name'] . "</option>";}	  print '</select><br>
				<input type="text" name="Prof" maxlength="25" placeholder="Profession"  required/> <br>
				<input type="text" name="Address" maxlength="70" placeholder="Address" required /> <br>
				<input type="text" name="Phone" maxlength="20" placeholder="Phone"  required/> <br>
				<input type="email" name="Email" maxlength="30" placeholder="Email" required/><br>
				Photo <input type="file" name="image" value="image" multiple accept="image/*"  required/></br>
				<textarea  name="Comment" maxlength="150" cols="50" rows="3" placeholder="Comment"></textarea><br>
				<input type="submit" name="newPatientFormSubmin" value="Enter">
			</form>
		';
	}		
	if(isset($_POST[newPatientForm])){
		newPatientForm();
	}
	if(isset($_POST[newEmployeeForm])){
		newEmployeeForm();
	}
	function newEmployeeForm(){
		print '
			<form enctype="multipart/form-data" accept-charset="cp1251_general_ci" name="emp" method="post">
				<select name="userClass" required>';
					$sql = mysql_query("SELECT * FROM UserClasses"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
					print '
				</select><br>
				<input type="text" name="name" maxlength="30" placeholder="Name" size="30"  required /><br>
				<input type="text" name="surname" maxlength="25" placeholder="Second Name" size="30"  required /><br>
				<input type="text" name="middle_name" maxlength="30" placeholder="Middle name" size="30" required /><br>
				Receipt date <input type="date" name="date"  required/><br>
				<select name="prof">';
					$sql = mysql_query("SELECT * FROM Staff"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
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
				<input type="submit" name="newEmployeeFormSubmin" value="Enter">
			</form>';
	}
	print '
				</td>
				<td class="homeMenu">
					<form method="POST">
						<input class="homeMenuButton" type="submit"  name="newPatientForm" value="Patient+">
						<input class="homeMenuButton" type="submit"	 name="newEmployeeForm" value="Employee+">
					</form>
				</td>
			</tr>
		</table>
	';
?>