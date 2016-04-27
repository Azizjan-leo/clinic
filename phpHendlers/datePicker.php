<?php 
	$mysqli = mysqli_connect('localhost', 'root', '123', 'system');
	$result = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID = $_POST[Emp_ID]");
	$data = $result->fetch_array();
	
	//time choosing
	if(isset($_POST[day])){
		$date = date("o-n-d" ,strtotime($_POST[year]."-".$_POST[month]."-".$_POST[day]));
		//for timezone
		$tz = 'Asia/Bishkek';
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
		$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
		$curTime = $dt->format('H:i');
		
		if (!$result = $mysqli->query("SELECT `Time` FROM `system`.`Ord` WHERE DoctorId = $_POST[Emp_ID] AND `Date` = '$date'")) {
			
			echo "Sorry, this website is experiencing problems.";
			
			echo "Error: Failed to make a MySQL connection, here is why: \n";
			echo "Errno: " . $mysqli->connect_errno . "\n";
			echo "Error: " . $mysqli->connect_error . "\n";
			
			exit;
		}
		$takenTime = array();
		while($df = $result->fetch_array(MYSQLI_ASSOC)){
			$takenTime[] = date("H:i",strtotime($df['Time']));
		}
		
		$result = $mysqli->query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_POST[Emp_ID]");
		$reception = $result->fetch_array();
		$reception = $reception['Time'];
		$result = $mysqli->query("SELECT `Start`, `Lunch_Start`, `Lunch_End`, `End` FROM `Schedule` WHERE Emp_ID = $_POST[Emp_ID] AND Day = '".date("D", strtotime($date))."'");
		$dataFromSchedule = $result->fetch_array(MYSQLI_ASSOC);
		if($dataFromSchedule[Lunch_Start] != $dataFromSchedule[Lunch_End])
			$lunch = true;
		
		$date = strtotime($date);
		echo "<center><table><tr>";
		if($_POST[day] == date("d")){ // time for current day because we need to hide not relevant time
			if($lunch){
				for($i_time = strtotime($dataFromSchedule[Start]), $i = 0; ($i_time + $reception) < strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
					if($i == 6){
						echo "</tr><tr>";
						$i = 0;
					}
					if(strtotime("+$reception minutes", $i_time) <= strtotime($dataFromSchedule['Lunch_Start']) or $i_time >= strtotime($dataFromSchedule['Lunch_End'])){
						if(!in_array ( date("H:i", $i_time) , $takenTime ) && date("H:i", $i_time) >= $curTime)
							echo "<td class='timeTable' id='$i_time'><a href='#' class='timeTableL' id='a$i_time' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
						else
							echo "<td><a href='#' class='grey'><b>" . date('H:i', $i_time). "</b></a></td>";
						$i++;
					}
				}
			}else{
				for($i_time = strtotime($dataFromSchedule[Start]), $i = 0; ($i_time + $reception) < strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
					if($i == 6){
						echo "</tr><tr>";
						$i = 0;
					}
					if(!in_array ( date("H:i", $i_time) , $takenTime ) && date("H:i", $i_time) >= $curTime)
						echo "<td class='timeTable' id='$i_time' ><a href='#' class='timeTableL' id='a$i_time' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
					else
						echo "<td><a href='#' class='grey'><b>" . date('H:i', $i_time). "</b></a></td>";
					$i++;
				}
			}
		}else{
			if($lunch){
				for($i_time = strtotime($dataFromSchedule[Start]), $i = 0; ($i_time + $reception) <= strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
					if($i == 6){
						echo "</tr><tr>";
						$i = 0;
					}
					if(strtotime("+$reception minutes", $i_time) <= strtotime($dataFromSchedule['Lunch_Start']) or $i_time >= strtotime($dataFromSchedule['Lunch_End'])){
						if(!in_array ( date("H:i", $i_time) , $takenTime ))
							echo "<td class='timeTable' id='$i_time'><a class='timeTableL' id='a$i_time' href='#' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
						else
							echo "<td><a href='#' class='grey'><b>" . date('H:i', $i_time). "</b></a></td>";
						$i++;
					}
				}	
			}
			else{
				for($i_time = strtotime($dataFromSchedule[Start]), $i = 0; ($i_time + $reception) <= strtotime($dataFromSchedule['End']); $i_time = strtotime("+$reception minutes", $i_time)) {
					if($i == 6){
						echo "</tr><tr>";
						$i = 0;
					}
					if(!in_array ( date("H:i", $i_time) , $takenTime ))
						echo "<td class='timeTable' id='$i_time'><a href='#' class='timeTableL' id='a$i_time' onClick='OrdConfirm($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $date, $i_time);'><b>" . date('H:i', $i_time). "</b></a></td>";
					else
						echo "<td><a href='#' class='grey'><b>" . date('H:i', $i_time). "</b></a></td>";
					$i++;
				}
			}
		
		}
		echo "</tr></table></center>";
		
	}
	// confirm box
	elseif(isset($_POST['time']))
		print "<br><button onclick='test($_POST[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $_POST[date], $_POST[time])'>Confirm</button>";
	// month and day choosing
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
						
						echo  "<colspan id='green'>" .$monthName . " " . $_POST[year] . "</colspan>";
						
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
							echo "<td align='center' ";
							
								if(!$start){
									if($firstDay == $i){
										$start = true;
										$i_day = "01";
										$tempDate = $_POST[year] . '-' . $selectedMonth . '-' . $i_day;
										if(in_array(date('D', strtotime($tempDate)), $workDays)){
											if($i_day < $today)
												echo "class='grey'>$i_day ";
											else
												echo "class='dayInDatePicker' id='$i_day'><a class='dayL' id='a$i_day' href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
										}
										else
											echo "class='red'>$i_day ";
									}
								}else{
									if(in_array(date('D', strtotime($tempDate)), $workDays)){
										if($i_day < $today)
											echo "class='grey'>$i_day ";
										else
											echo "class='dayInDatePicker' id='$i_day'><a class='dayL' id='a$i_day' href='#' onClick='SelectDay($data[Emp_ID], $_POST[patientId], $_POST[unregVisitorId], $i_day, $selectedMonth, $_POST[year]);'><b>$i_day</b></a> ";
									}else
										echo "class='red'>$i_day ";
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