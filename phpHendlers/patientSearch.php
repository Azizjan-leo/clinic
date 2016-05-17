<?
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		// Соединяю с БД
		include('connect.php');
		if(isset($_POST[diagnoses])){
			// формирую запрос
			$query = "SELECT `Patient_ID`, `Diagnosis_ID` FROM `Patient_diagnosis` WHERE `Diagnosis_ID` IN (" . implode(",", $_POST['diagnoses']) . ")";
			
			//Проверяю не возникло ли ошибок
			if(!$result = $mysqli->query($query))
				printf("Errormessage: %s\n", $mysqli->error);
			
			//Массив пациетнов, в чьих диагнозах есть хотя бы один из выбраных
			$candidates = array();
			while($tmp = $result->fetch_array(MYSQLI_ASSOC)){
				$candidates[$tmp['Patient_ID']][$tmp['Diagnosis_ID']] = 1;
			}
			
			$cand = array();
			foreach($candidates AS $k => $v)
			{
				if(sizeof($v) != sizeof($_POST['diagnoses']))unset($candidates[$k]);
				else $cand[] = $k;
			}
		}
		$result = $mysqli->query("SELECT `Patient_ID` FROM `Doctor_Patient_relationships` WHERE Emp_ID = '$_POST[Emp_ID]' AND `Advise_or_Treat` LIKE '%$_POST[relation]'");
		$relation = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC))
			$relation[] = $row[Patient_ID];
		
		$result = $mysqli->query("SELECT * FROM `patients` WHERE `Virus` LIKE '%$_POST[virus]%' AND `Gender` LIKE '%$_POST[gender]%' AND `ID` IN (" . implode(",", array_map('intval', $relation)) . ")");
	
		$i = 0; // for couting returned rows
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			if(isset($_POST[diagnoses])){
				if(in_array($row[ID],$cand)){
					print "<div style='text-align: left; display:inline-block;'>" . ++$i . "</div><div style='display:inline-block;'><a href='index.php?patient=$row[ID]'>$row[First_Name] $row[Middle_Name] $row[Second_Name] $row[Birth_Date]</a></div><br>";
					
				}
			}else
				print ++$i ."<a href='index.php?patient=$row[ID]'>$row[First_Name] $row[Middle_Name] $row[Second_Name] $row[Birth_Date]</a><br>";
		}
		print "<script> document.getElementById('patientSearchResCount').innerHTML = 'Total: ' + $i; </script>";
		$result->close();
	}
	