<?php
	include("connect.php");
	if(isset($_POST[newEmployeeFormSubmit])){
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
			if(mysql_query("INSERT INTO `Employee` VALUES('".$id."','".$class."','".$name."','".$surname."','".$middle_name."','".$prof."','".$carierStart."','".$category."','".$phone_num."','".$passport_data."','".$date."','".$_FILES['image']['name']."','".$_POST[curriculumVitae]."')") or die(mysql_error())){
				if(mysql_query("INSERT INTO `Schedule` VALUES(NULL, '".$id."', NULL, NULL, NULL, NULL, NULL)")){
					if(move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$_FILES['image']['name'])){
						print "<script type='text/javascript'>window.location.href='../index.php?content=home&massage=NewId&NewId=$id'</script>";
					}else{echo "can't move_uploaded_file";}
				}else{echo "can't insert into Schedule";}
			}else{echo"can't insert into Employee";}			
		}else{echo "Image uploading error";}
	}
	if(isset($_POST[newPatientFormSubmit])){
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
				if(move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$_FILES['image']['name'])){
					print "<script type='text/javascript'>window.location.href='../index.php?content=home&massage=NewId&NewId=$id'</script>";
				}				
			}
		}
		else{
			echo '<p style="color: red">File loading error</p>';
		}
		
	}
	if(isset($_POST[scheduleSubmitButton])){
		for($i=0; $i < count($_SESSION[days]); $i++){
			mysql_query("INSERT INTO `Schedule`(`Day_ID`, `Emp_ID`, `Day`, `Start`, `Lunch_Start`, `Lunch_End`, `End`) VALUES (NULL, '".$_SESSION[userData][Emp_ID]."','".$_SESSION[days][$i]."','".$_POST["start$i"]."','".$_POST["lunchStart$i"]."','".$_POST["lunchEnd$i"]."','".$_POST["end$i"]."')") or die(mysql_error());
		}
		$t = mysql_fetch_array(mysql_query("SELECT Time FROM `Reception` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'"));
		if($t['Time']){
			if($t['Time'] != $_POST[oneReception]){
				$newReception = true;
				mysql_query("UPDATE `Reception` SET Time = '".$_POST[oneReception]."' WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			}
		}else{
			$newReception = true;
			mysql_query("INSERT INTO `Reception`(`Emp_ID`, `Time`) VALUES ('".$_SESSION[userData][Emp_ID]."','".$_POST[oneReception]."')");
		}
		unset($_SESSION[days]);
		print "<script type='text/javascript'>window.location.href='../index.php?content=home&massage=NewSchedule&NewReception=$newReception'</script>";
	}
	if(isset($_POST[allAsOneSubmit])){
		for($i=0; $i < count($_SESSION[days]); $i++){
			mysql_query("INSERT INTO `Schedule`(`Day_ID`, `Emp_ID`, `Day`, `Start`, `Lunch_Start`, `Lunch_End`, `End`) VALUES (NULL, '".$_SESSION[userData][Emp_ID]."','".$_SESSION[days][$i]."','".$_POST["start"]."','".$_POST["lunchStart"]."','".$_POST["lunchEnd"]."','".$_POST["end"]."')") or die(mysql_error());
		}
		$t = mysql_fetch_array(mysql_query("SELECT Time FROM `Reception` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'"));
		if($t['Time']){
			if($t['Time'] != $_POST[oneReception]){
				$newReception = true;
				mysql_query("UPDATE `Reception` SET Time = '".$_POST[oneReception]."' WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			}
		}else{
			$newReception = true;
			mysql_query("INSERT INTO `Reception`(`Emp_ID`, `Time`) VALUES ('".$_SESSION[userData][Emp_ID]."','".$_POST[oneReception]."')");
		}
		unset($_SESSION[days]);
		print "<script type='text/javascript'>window.location.href='../index.php?content=home&massage=NewSchedule&NewReception=$newReception'</script>";
	}
	if(isset($_POST[scheduleEditSubmitButton3])){
		$res = $mysqli->query("SELECT Day FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
		$days = array();
		while($row =  $res->fetch_array(MYSQLI_ASSOC)) {
			if(in_array($row[Day], $_SESSION[days]))
				$days[] = $row[Day];
			else
				$mysqli->query("DELETE FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."' AND Day = '".$row[Day]."'");
		}
		for($i=0; $i < count($_SESSION[days]); $i++){
			if(in_array($_SESSION[days][$i],$days)){
				$mysqli->query("UPDATE `Schedule` SET Start = '".$_POST["start$i"]."', Lunch_Start = '".$_POST["lunchStart$i"]."', Lunch_End = '".$_POST["lunchEnd$i"]."', End = '".$_POST["end$i"]."' WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."' AND Day = '".$_SESSION[days][$i]."'") or die(mysql_error());
			}else{
				$mysqli->query("INSERT INTO `Schedule`(`Day_ID`, `Emp_ID`, `Day`, `Start`, `Lunch_Start`, `Lunch_End`, `End`) VALUES (NULL, '".$_SESSION[userData][Emp_ID]."','".$_SESSION[days][$i]."','".$_POST["start$i"]."','".$_POST["lunchStart$i"]."','".$_POST["lunchEnd$i"]."','".$_POST["end$i"]."')") or die(mysql_error());
			}
		}
		$query = $mysqli->query("SELECT Time FROM `Reception` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'");
		$t = $query->fetch_array(MYSQLI_ASSOC);
		if($t['Time']){
			if($t['Time'] != $_POST[oneReception]){
				$newReception = true;
				$mysqli->query("UPDATE `Reception` SET Time = '".$_POST[oneReception]."' WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			}
		}else{
			$newReception = true;
			$mysqli->query("INSERT INTO `Reception`(`Emp_ID`, `Time`) VALUES ('".$_SESSION[userData][Emp_ID]."','".$_POST[oneReception]."')");
		}
		unset($_SESSION[days]);
		print "<script type='text/javascript'>window.location.href='../index.php?content=home&massage=NewSchedule&NewReception=$newReception'</script>";
	}
	?>