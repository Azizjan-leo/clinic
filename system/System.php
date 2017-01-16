<div align='center'><?php
	if($_SESSION[systAccess])
	{
		include("phpHendlers/connect.php");
		$_SESSION['form'] = true;
		//Hendlers
			if(isset($_POST['position']) and $_SESSION['form']){
				$name = $_POST['name'];
				$salary = $_POST['salary'];
				$unit = $_POST['unit'];
				$isDoctor = $_POST[doctor];					
				 // Проверяем, что при загрузке не произошло ошибок
				if ( $_FILES['image']['error'] == 0 ) {
					// Если файл загружен успешно, то проверяем - графический ли он
					if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
					  // Читаем содержимое файла
					  $image = file_get_contents( $_FILES['image']['tmp_name'] );
					  // Экранируем специальные символы в содержимом файла
					  $image = $mysqli->real_escape_string( $image );
					  // Формируем запрос на добавление файла в базу данных
					  $query="INSERT INTO `Staff` VALUES(NULL,'".$name."','".$salary."','".$unit."','".$_FILES['image']['name']."')";
					  // После чего остается только выполнить данный запрос к базе данных
					  $mysqli->query( $query );
					 
					  // Также отправляем картинку в папку unloaded_images
					  function Uploading($files){
						move_uploaded_file($files['tmp_name'], 'images/'.$files['name']);
					  }
					  Uploading($_FILES['image']);
					}
				}
				$_POST['position'] = false;
				$_SESSION['form'] = false;
			}
			
			if(isset($_POST['employee']) and $_SESSION['form']){
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$middle_name = $_POST['middle_name'];
				$date = $_POST['date'];
				$prof = $_POST['prof'];
				$phone_num = $_POST['phone_num'];
				$passport_data = $_POST['passport_data'];
				$isDoctor = $_POST['doctor'];
				$carierStart = $_POST['carierStart'];
				$category = $_POST['category'];
				$class = $_POST['userClass'];
				$curriculumVitae = $_POST['curriculumVitae'];
				 // Проверяем, что при загрузке не произошло ошибок
				if ( $_FILES['image']['error'] == 0 ) {
					// Если файл загружен успешно, то проверяем - графический ли он
					if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
					  // Читаем содержимое файла
					  $image = file_get_contents( $_FILES['image']['tmp_name'] );
					  // Экранируем специальные символы в содержимом файла
					  $image = $mysqli->real_escape_string( $image );
					  // Формируем запрос на добавление файла в базу данных
					  $query="INSERT INTO `Employee` VALUES(NULL,'".$class."','".$name."','".$surname."','".$middle_name."','".$prof."','".$carierStart."','".$category."','".$phone_num."','".$passport_data."','".$date."','".$_FILES['image']['name']."','".$curriculumVitae."')";
					  // После чего остается только выполнить данный запрос к базе данных
					  $mysqli->query( $query );
					 
					  // Также отправляем картинку в папку unloaded_images
					  function Uploading($files){
						move_uploaded_file($files['tmp_name'], 'images/'.$files['name']);
					  }
					  Uploading($_FILES['image']);
					}
				}
				
				$_POST['position'] = false;
				$_SESSION['form'] = false;
			}
			if(isset($_POST['symptom']) and $_SESSION['form']){
				$name = $_POST['name'];
				$description = $_POST['description'];
				$query="INSERT INTO `Symptoms` VALUES(NULL,'".$name."','".$description."')";
				$mysqli->query( $query );
				$_POST['position'] = false;
				$_SESSION['form'] = false;
			}
			if(isset($_POST['diagnosis']) and $_SESSION['form']){
				$name = $_POST['name'];
				$description = $_POST['description'];
				//$symptoms = $_POST['symptoms'];
				$mysqli->query("INSERT INTO `Diagnosis`(`ID`, `Name`, `Description`) VALUES (NULL, '$name', '$description')");
				$diagnosisID = $mysqli->insert_id;
				
				foreach( $_POST['symptoms'] as $v ) {
					$result = $mysqli->query("SELECT `ID` FROM `Symptoms` WHERE `Name` = '$v'");
					$symptom_ID = $result->fetch_array(MYSQLI_ASSOC);
					$symptom_ID = $symptom_ID[ID];
					$mysqli->query("INSERT INTO `Diagnosis_symptoms` (`ID`, `Diagnosis_ID`, `Symptom_ID`) VALUES (NULL, '$diagnosisID', '$symptom_ID')");
				}
				
				$_POST['position'] = false;
				$_SESSION['form'] = false;
			}		
		//End
		if($_SESSION["systAccess"])
		{
			if(isset($_GET['item']) and $_SESSION['form']){
				$item = $_GET['item'];
			if($item == "diagnosis"){
				print 'Diagnosis adding
				 <form name="diagnoses" id="diagnosis" method="POST" >
				  <input type="text" name="name" maxlength="50" placeholder="Diagnosis name" size="30" required /><br>
				  <input type="text" id="symptoms" name="symptomsField" maxlength="50" placeholder="Symptoms" size="30" /><br>
				  <select id="heightSelect" multiple="multiple" name="selectingSymptoms[]" onclick="fuckMe()">';
				  	$sql = $mysqli->query("SELECT `Name` FROM Symptoms"); while ($row = $sql->fetch_array(MYSQLI_ASSOC)){ echo "<option value='".$row['Name']."'>" . $row['Name'] . "</option>";}
				  print '</select><br>
				  <textarea name="description" maxlength="500" cols="50" rows="2" placeholder="Description" required></textarea><br>
				  <input type="submit" name="diagnosis" value="Enter">
				 </form>';
				printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
				printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',emloyee);
				printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
			}
			else if($item == "position"){
					print 'Position adding.
					 <form enctype="multipart/form-data" accept-charset="cp1251_general_ci" name="staff" method="post">
					  <input type="text" name="name" maxlength="30" placeholder="Position name" size="30" required /><br>
					  Is a doctor <input type="checkbox" name="doctor" value="1" checked> <br>
					  <input type="text" name="salary" maxlength="11" placeholder="Salary" size="30" required /><br>
					  <select name="unit"><option value="1">Dollar</option><option value="2">Euro</option><option value="3">Ruble</option><option value="4">Som</option></select><br>
					  <input type="file" name="image" value="Image" multiple accept="image/*"></br>
					  <input type="submit" name="position" value="Enter">
					 </form>';
					printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',employee);
					printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
					printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
					$_SESSION['form'] = false;
				}
				else if($item == "employee"){
					print 'Employee.
					 <form enctype="multipart/form-data" accept-charset="cp1251_general_ci" name="emp" method="post">
					  <select name="userClass">';
					  $sql = $mysqli->query("SELECT * FROM UserClasses"); while ($row = mysqli_fetch_array($sql)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
					  print '</select><br>
					  <input type="text" name="name" maxlength="30" placeholder="Name" size="30" required /><br>
					  <input type="text" name="surname" maxlength="30" placeholder="Surname" size="30" required /><br>
					  <input type="text" name="middle_name" maxlength="30" placeholder="Middle name" size="30" ><br>
					  Receipt date<br>
					  <input type="date" name="date" required /><br>
					  <select name="prof">';
					  $sql = $mysqli->query("SELECT * FROM Staff"); while ($row = mysqli_fetch_array($sql)){ echo "<option value=".$row['Id'].">" . $row['Name'] . "</option>";}
					  print '</select><br>
					  Is a doctor <input type="checkbox" name="doctor" value="1" checked> <br>
					  Carier start<br>
					  <input type="date" name="carierStart" required /><br>
					  Category<br>
					  <select name="category">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					  </select><br>
					  <input type="text" name="phone_num" maxlength="15" placeholder="Telephone" size="30" required /><br>
					  <input type="text" name="passport_data" placeholder="Passport data" required /><br>
					  <textarea cols="100" rows="10" name="curriculumVitae" placeholder="Curriculum vitae" required></textarea><br>
					  <input type="file" name="image" value="Image" multiple accept="image/*"></br>
					  <input type="submit" name="employee" value="Enter">
					 </form>';
					printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
					printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
					printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
				}
				else if($item == "symptom"){
					print 'Symptom adding.
					 <form name="symptoms" method="post">
					  <input type="text" name="name" maxlength="50" placeholder="Symptom name" size="30" required /><br>
					  <textarea name="description" maxlength="200" cols="50" rows="3" placeholder="Description" required></textarea><br>
					  <input type="submit" name="symptom" value="Enter">
					 </form>';
					printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
					printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',emloyee);
					printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
				}
			}
			else{
				printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>
						 <a href="../index.php?item=%s" class="button blue">New employee</a><br>
						 <a href="../index.php?item=%s" class="button blue">New symptom</a><br>
						 <a href="../index.php?item=%s" class="button blue">New diagnosis</a>',position,employee,symptom,diagnosis);						 
			}
		}
		print "
		<script>
			function fuckMe(){
				
				var selectedSymptom = document.getElementById('heightSelect').value;
				document.getElementById('symptoms').value += selectedSymptom + ' ';
				var input = document.createElement('input');
				input.setAttribute('type', 'hidden');
				input.setAttribute('name', 'symptoms[]');
				input.setAttribute('value', selectedSymptom);
				//append to form element that you want .
				document.getElementById('diagnosis').appendChild(input);
			}
		</script>
			";
	}
?></div>
