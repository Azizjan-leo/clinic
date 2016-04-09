<?php 
	$mysqli = mysqli_connect('localhost', 'root', '123', 'system');
	
	$result = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID= $_POST[name]");
	$data = $result->fetch_array();
	$result = $mysqli->query("SELECT Name FROM Staff WHERE Id = $data[Prof]");
	$dataFromStaff = $result->fetch_array();
	$result = $mysqli->query("SELECT * FROM `Schedule` WHERE Emp_ID = $_POST[name]") or die(mysql_error());
	$currentDate = date('m/d/Y');
	$diff = abs(strtotime($currentDate) - strtotime($data[CarierStart]));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));


					print "
					<center><div>";
			
					$query = $mysqli->query("SELECT `Day` FROM Schedule WHERE Emp_ID = '$data[Emp_ID]'") or die($mysqli->error());
					
					$selectedMonth = $_POST[month];
						
					echo $_SESSION[month] . "<br>";
					$tempDate = date('o') . '-' . $selectedMonth . '-01';
					$days_in_month = cal_days_in_month(CAL_GREGORIAN, date('n', strtotime($tempDate)), date("o")); // n - number of the month leading zeros //// o - year like 2016
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
					for($list_day = "01"; $list_day <= $days_in_month; $list_day = sprintf("%02d", $list_day + 1)){
						$tempDate = date('o') . '-' . $selectedMonth . '-' . $list_day;
						if($i == 1)
							echo "<tr>";
						echo "<td align='center'>";
						
							if(!$start){
								if($firstDay == $i){
									$start = true;
									$list_day = "01";
									$tempDate = '2016-03-' . $list_day;
									if(in_array(date('D', strtotime($tempDate)), $workDays)){
										if($list_day < date('d'))
											echo "<font color='grey'>$list_day</font> ";
										else
											echo "<b>$list_day</b> ";
									}
									else
										echo "<font color='red'>$list_day</font> ";
								}
							}else{
								if(in_array(date('D', strtotime($tempDate)), $workDays)){
									if($list_day < date('d'))
										echo "<font color='grey'>$list_day</font> ";
									else
										echo "<a href='#&selectedDay'><b>$list_day</b></a> ";
								}else
									echo "<font color='red'>$list_day</font> ";
							}
							
						echo "</td>";
						$i++;
						if($i == 8){
							echo "</tr>"; $i = 1;
						}
					}
						print "
					</table></div></center>";
 ?>