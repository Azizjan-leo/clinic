<?php 
	$mysqli = mysqli_connect('localhost', 'root', '123', 'system');
	$result = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID = $_POST[Emp_ID]");
	$data = $result->fetch_array();
	//time choosing
	if(isset($_POST[day])){
		$date = date("o-n-d" ,strtotime($_POST[year]."-".$_POST[month]."-".$_POST[day]));
		
		if (!$result = $mysqli->query("SELECT `Time` FROM `system`.`Ord` WHERE DoctorId = $_POST[Emp_ID] AND `Date` = '$date'")) {
			
			echo "Sorry, this website is experiencing problems.";
			
			echo "Error: Failed to make a MySQL connection, here is why: \n";
			echo "Errno: " . $mysqli->connect_errno . "\n";
			echo "Error: " . $mysqli->connect_error . "\n";
			
			exit;
		}
		$takenTime = array();
		while($df = $result->fetch_array(MYSQLI_ASSOC)){
			$takenTime[] = $df['Time'];
		}
		echo date("H:i:s");
		$result = $mysqli->query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_POST[Emp_ID]");
		$reception = $result->fetch_array();
		$reception = $reception['Time'];
		$result = $mysqli->query("SELECT `Start`, `Lunch_Start`, `Lunch_End`, `End` FROM `Schedule` WHERE Emp_ID = $_POST[Emp_ID] AND Day = '".date("D", strtotime($date))."'");
		$dataFromSchedule = $result->fetch_array(MYSQLI_ASSOC);
		if($dataFromSchedule[Lunch_Start] != $dataFromSchedule[Lunch_End])
			$lunch = true;
		
		$date = strtotime($date);
		echo "<center><table><tr>";
		for($i_time = strtotime($dataFromSchedule[Start]), $i = 0; ($i_time + $reception) < strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
			if($i == 7){
				echo "</tr><tr>";
				$i = 0;
			}
			echo "<td class='timeTable' id='$i_time' style='background-color: white; border-radius: 7px;'><a href='#' ";
			if($lunch){
				if(strtotime("+$reception minutes", $i_time) <= strtotime($dataFromSchedule['Lunch_Start']) or $i_time >= strtotime($dataFromSchedule['Lunch_End'])){
					if(!in_array ( date("H:i", $i_time) , $takenTime ))
						echo "onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
					else
						echo "><font color='grey'><b>" . date('H:i', $i_time). "</b></font></a></td>";
					$i++;
				}
			}else{
				if(!in_array ( date("H:i", $i_time) , $takenTime ))
					echo "onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
				else
					echo "><font color='grey'><b>" . date('H:i', $i_time). "</b></font></a></td>";
				$i++;
			}
		}
		echo "</tr></table></center>";
		
	}
	elseif(isset($_POST['time'])){
		echo "<b>" .$date = date("o-n-d", $_POST['date']) . " " . $time = date("H:i:s", $_POST['time']) . "</b>";

		echo "<br><button onclick='test($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $_POST[date], $_POST[time])'>Confirm</button>";
	}
	else{
		$selectedMonth = $_POST[month];
		if($selectedMonth == date('n'))
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
							echo "<td align='center' class='dayInDatePicker' id='$i_day' style='border-radius: 7px;'>";
							
								if(!$start){
									if($firstDay == $i){
										$start = true;
										$i_day = "01";
										$tempDate = $_POST[year] . '-' . $selectedMonth . '-' . $i_day;
										if(in_array(date('D', strtotime($tempDate)), $workDays)){
											if($i_day < $today)
												echo "<font color='grey'>$i_day</font> ";
											else
												echo "<a style='text-decoration: none;' href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
										}
										else
											echo "<font color='red'>$i_day</font> ";
									}
								}else{
									if(in_array(date('D', strtotime($tempDate)), $workDays)){
										if($i_day < $today)
											echo "<font color='grey'>$i_day</font> ";
										else
											echo "<a style='text-decoration: none;' href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
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