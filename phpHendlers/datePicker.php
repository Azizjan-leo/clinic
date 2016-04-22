<?php 
	$mysqli = mysqli_connect('localhost', 'root', '123', 'system');
	$result = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID = $_POST[Emp_ID]");
	$data = $result->fetch_array();
	
	if(isset($_POST[day])){
		$result = $mysqli->query("SELECT `DateTime` FROM `Ord` WHERE DoctorId = $_POST[Emp_ID]");
		$dataFromOrd = array();
		while($df = $result->fetch_array(MYSQLI_ASSOC))
			$dataFromOrd[] = $df['DateTime'];
		
		$result = $mysqli->query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_POST[Emp_ID]");
		$reception = $result->fetch_array();
		$reception = $reception['Time'];
		$date = strtotime($_POST[year]."-".$_POST[month]."-".$_POST[day]);
		
		$result = $mysqli->query("SELECT `Start`, `Lunch_Start`, `Lunch_End`, `End` FROM `Schedule` WHERE Emp_ID = $_POST[Emp_ID] AND Day = '".date("D", $date)."'");
		$dataFromSchedule = $result->fetch_array(MYSQLI_ASSOC);
		if($dataFromSchedule[Lunch_Start] != $dataFromSchedule[Lunch_End]){
			$lunch = true;
		}
		
		echo $_POST[month] . "/" . $_POST[day] . "/" . $_POST[year] . "<br>" . date("l", $date) . "<br><br>";
		
		
		$i = 0;
		echo "<center><table><tr>";
		for($i_time = strtotime($dataFromSchedule[Start]); ($i_time + $reception) < strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
			if($i == 7){
				echo "</tr><tr>";
				$i = 0;
			}
			if($lunch){
				if(strtotime("+$reception minutes", $i_time) <= strtotime($dataFromSchedule['Lunch_Start']) or $i_time >= strtotime($dataFromSchedule['Lunch_End']))
					echo "<td style='background-color: white; border-radius: 7px;'><a href='#' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('h:i', $i_time). "</b></a></td>";
			}else
				echo "<td style='background-color: white; border-radius: 7px;'><a href='#' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('h:i', $i_time). "</b></a></td>";
			$i++;
		}
		echo "</tr></table></center>";
		
	}
	elseif(isset($_POST['time'])){
		echo $dateTime = date("o-n-d", $_POST['date']) . " " . date("h:i:s", $_POST['time']);
		echo "<br><a href='phpHendlers/newOrd.php?dateTime=$dateTime&Emp_ID=$_POST[Emp_ID]&PatientId=$_POST[patientId]&UnregVisitorId=$_POST[unregVisitorId]'>Confirm</a>";
	}
	else{
		$selectedMonth = $_POST[month];
		if($selectedMonth == 11 /*date('n')*/)
			$today = date('d');
		else
			$today = '01';

						print "
						<center><div>";
				
						$query = $mysqli->query("SELECT `Day` FROM Schedule WHERE Emp_ID = '$data[Emp_ID]'") or die($mysqli->error());
						
						$dateObj   = DateTime::createFromFormat('!m', $selectedMonth);
						$monthName = $dateObj->format('F'); // March	
						
						echo  $monthName . " " . $_POST[year] . "<br>";
						
						$selectedMonth = sprintf("%02d", $selectedMonth);
						
						$tempDate = $_POST[year] . '-' . $selectedMonth . '-01';
						$days_in_month = cal_days_in_month(CAL_GREGORIAN, date('n', strtotime($tempDate)), $_POST[year]); // n - number of the month leading zeros //// o - year like 2016
						$workDays = array();
						$firstDay = date('N', strtotime($tempDate));
						while($row = $query->fetch_array(MYSQLI_ASSOC)){
							$workDays[] = $row[Day];
						}
						$i = 1;
						print "<table>
								<tr>
									<th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th>
								</tr>";
						for($i_day = "01"; $i_day <= $days_in_month; $i_day = sprintf("%02d", $i_day + 1)){
							$tempDate = $_POST[year] . '-' . $selectedMonth . '-' . $i_day;
							if($i == 1)
								echo "<tr>";
							echo "<td align='center'>";
							
								if(!$start){
									if($firstDay == $i){
										$start = true;
										$i_day = "01";
										$tempDate = $_POST[year] . '-' . $selectedMonth . '-' . $i_day;
										if(in_array(date('D', strtotime($tempDate)), $workDays)){
											if($i_day < $today)
												echo "<font color='grey'>$i_day</font> ";
											else
												echo "<a href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
										}
										else
											echo "<font color='red'>$i_day</font> ";
									}
								}else{
									if(in_array(date('D', strtotime($tempDate)), $workDays)){
										if($i_day < $today)
											echo "<font color='grey'>$i_day</font> ";
										else
											echo "<a href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
									}else
										echo "<font color='red'>$i_day</font> ";
								}
								
							echo "</td>";
							$i++;
							if($i == 8){
								echo "</tr>"; $i = 1;
							}
						}
							print "
						</table></div></center>";
	}
 ?>