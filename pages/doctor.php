<?php
	if($_GET[docList])
	{
		if($_GET[docList] == 'all')	// Choosing a prof of the doctor
		{
			$result = $mysqli->query("SELECT * FROM Staff");
			$data = $result->fetch_array();
			
			echo '<table align="center">';
			
			do
			{
				echo '<tr>';
				$j = 0;
			
				do
				{
					printf ('<td align="center"><a href="../index.php?docList=%s"><img  height="135" width="140" src="images/'.$data[Image].'" /><br>'.$data[Name].'</a></td>', $data[Id]);
					$j++;
				}
				while($j<4 and $data = $result->fetch_array());
					
				print '</tr>';
	
			}
			while($data = $result->fetch_array());

			echo '</table>';
		}
		else 	// Choosing particular doctor
		{
			$prof = $_GET[docList];
			$result = $mysqli->query("SELECT * FROM Employee WHERE Prof='$prof'") or die(mysql_error());
			$data = $result->fetch_array();
			
			echo '<table align="center">';
			if($data[0]){
				do
				{
					echo '<tr>';
					$j = 0;
				
					do
					{
						printf ('<td align="center"><a href="../index.php?doctor=%s"><img  height="170" width="160" src="images/'.$data[Image].'" /><br>
								 '.$data[First_Name].' '.$data[Surname].'</a></td>', $data[Emp_ID]);
						$j++;
					}
					while($j<4 and $data = $result->fetch_array());

					echo '</tr>';
				}
				while($data = $result->fetch_array());
			}
			
			echo '</table>';
		}
	}
	
	if(isset($_GET[doctor])){
		$result = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID=$_GET[doctor]");
		$data = $result->fetch_array();
		$result = $mysqli->query("SELECT Name FROM Staff WHERE Id = $data[Prof]");
		$dataFromStaff = $result->fetch_array();
		$result = $mysqli->query("SELECT * FROM `Schedule` WHERE Emp_ID = $_GET[doctor]") or die(mysql_error());
		$currentDate = date('m/d/Y');
		$diff = abs(strtotime($currentDate) - strtotime($data[CarierStart]));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		 
		if(isset($_GET[rating])){
			$query = $mysqli->query("SELECT Id FROM Doctor_Patient_relationships WHERE Emp_ID = $data[Emp_ID] and Patient_ID = '".$_SESSION[userData][ID]."'");
			$relation = $query->fetch_array(MYSQLI_ASSOC);
			if(!$relation[Id]){
				$mysqli->query("INSERT INTO `Doctor_Patient_relationships` VALUES (NULL, $data[Emp_ID], '".$_SESSION[userData][ID]."', '".$_GET[rating]."')");
				if($_GET[rating] == 1)
					$mysqli->query("UPDATE `Rating` SET Likes = Likes + 1 WHERE Emp_ID = $data[Emp_ID]");
				else
					$mysqli->query("UPDATE `Rating` SET Dislikes = Dislikes + 1 WHERE Emp_ID = $data[Emp_ID]");
				echo "Your first voting on this doc :) My congratulations, bitch!";
			}else{
				$qurey = $mysqli->query("SELECT Rating_changed FROM Doctor_Patient_relationships WHERE Emp_ID = $data[Emp_ID] and Patient_ID = '".$_SESSION[userData][ID]."'");
				$vote = $qurey->fetch_array(MYSQLI_ASSOC);
				if($vote[Rating_changed] == $_GET[rating])
					echo "You're already rated this doc, bitch!";
				else{
					$mysqli->query("UPDATE `Doctor_Patient_relationships` SET Rating_changed = '".$_GET[rating]."' WHERE Emp_ID = $data[Emp_ID] and Patient_ID = '".$_SESSION[userData][ID]."'");
					if($_GET[rating] == 1){
						$mysqli->query("UPDATE `Rating` SET Likes = Likes + 1 WHERE Emp_ID = $data[Emp_ID]");
						$mysqli->query("UPDATE `Rating` SET Dislikes = Dislikes - 1 WHERE Emp_ID = $data[Emp_ID]");
					}
					else{
						$mysqli->query("UPDATE `Rating` SET Dislikes = Dislikes + 1 WHERE Emp_ID = $data[Emp_ID]");
						$mysqli->query("UPDATE `Rating` SET Likes = Likes - 1 WHERE Emp_ID = $data[Emp_ID]");
					}
					echo "Ok, your vote changed :)";
				}
					
			}
		}
		$query = $mysqli->query("SELECT Likes, Dislikes FROM Rating WHERE Emp_ID = $data[Emp_ID]");
		$rating = $query->fetch_array(MYSQLI_ASSOC);
		print "
			<div class='docInfo'>
				<div class='doc_photo_rating'> 
					<img src='../images/$data[Image]'>
					<div class='rating'>
						Likes: $rating[Likes]";
					if($_SESSION['class'] == 4)
						print "
						<a style='text-decoration: none; color: green;' href='../index.php?doctor=$data[Emp_ID]&rating=1'>&#128077;</a>
						<a style='text-decoration: none; color: red;' href='../index.php?doctor=$data[Emp_ID]&rating=2'>&#128078;</a>";
						print "
						Dislikes: $rating[Dislikes]
					</div>
				</div>
				<div class='doc_about'>
						<center><big><b>$data[First_Name] $data[Middle_Name] $data[Surname]<br><br>
					$dataFromStaff[Name] of $data[Category] category <br>
					</b>Experience:<b> $years years $months months</b><br>
						<br><table class='brd'><tr><td></td><td>From</td><td colspan='2' style='text-align: center;'>Lunch</td><td style='text-align: center;'>To</td></tr>Weekdays";
						while($dataFromSchedule = $result->fetch_array()){
							print "<tr><th>$dataFromSchedule[Day]</th>
								<td>".date('H:i',strtotime($dataFromSchedule[Start]))."</td>";
								if($dataFromSchedule[Lunch_Start] != $dataFromSchedule[Lunch_End]){
									print "<td>".date('H:i',strtotime($dataFromSchedule[Lunch_Start]))."</td>
										   <td>".date('H:i',strtotime($dataFromSchedule[Lunch_End]))."</td>";
								}else{
									print "<td colspan='2' style='text-align: center;'> - </td>";
								}
								print "<td>".date('H:i',strtotime($dataFromSchedule['End']))."</td></tr>";
						}
						print "</table>";
						$forOneRecp = $mysqli->query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_GET[doctor]");
					$oneRecp = $forOneRecp->fetch_array();
					if($oneRecp['Time']){
						print "<br>Average  reception time: ".$oneRecp['Time']." min";
					}
					print "</big></center>
				</div>
				<div class='orderView'>
					<center> 
						<big> Order </big> <br>
					</center>
					<div class='orderAction'>
						<center><a href='#' class='button' onClick='hiddenShow(\"b1\");  Get(".$data[Emp_ID].");' id='button11'>Запись на прием</a></center><br>";
					
					$res = $mysqli->query("SELECT PatientId, UnregVisitorId FROM `Order` WHERE DoctorId = '$data[Emp_ID]' ORDER by Id DESC");
					while($order = $res->fetch_array()){
						
						if($order[PatientId]){
						
							$forPtr = $mysqli->query("SELECT First_Name, Second_Name, Phone FROM patients WHERE ID = '$order[PatientId]'");
							$ptr = $forPtr->fetch_array();

						}else{

							$forPtr = $mysqli->query("SELECT First_Name, Second_Name, Phone FROM UnregVisitors WHERE Id = '$order[UnregVisitorId]'");
							$ptr = $forPtr->fetch_array();
						
						}

						print $ptr[First_Name]." ".$ptr[Second_Name]." ".$ptr[Phone]."<br>";
					}
					print "
					</div>
				</div>
			</div>
			<hr><br>$data[CurriculumVitae]<br>";					 
		$result = $mysqli->query("SELECT * FROM Emp_comments WHERE Emp_ID = $data[Emp_ID] ORDER by `Date` DESC") or die(mysql_error());
		$comments = $result->fetch_array();
		if($comments){
			do
			{
				$res = $mysqli->query("SELECT First_Name, Second_Name, ID FROM patients WHERE ID = $comments[Patient_Id]") or die(mysql_error());
				$patientData = $res->fetch_array();
				print "<div class='comment_block'>";
							if($_SESSION['class'] == 4 and $patientData[ID] == $_SESSION[userData][ID])
								print "$comments[Text] <a href='../phpHendlers/commentDeleting.php?id=$comments[Emp_comments_ID]&from=$data[Emp_ID]' style='text-decoration: none; text-color: grey'>&#10005</a><br>";
							else
								print "$comments[Text]<br>";
				print "<div class='comment_signiture'>$patientData[First_Name] $patientData[Second_Name]</div></div>";
			}
			while($comments = $result->fetch_array());
		}else{
			print '<centr>Nobody leaves a comment<br></center>';
		}
		if($_SESSION["class"] == 4){
			print "<center><div class='state'><a href='#' class='button blue' onClick='hiddenShow(\"b3\");' id='button1'>Leave a comment</a></div></center>";
			print '<i class="fa fa-heart" style="font-size:24px; color: red;"></i>';
		}
		if(isset($_POST[registeredVisitor])){			
			if(!($mysqli->query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, '".$_SESSION[userData][ID]."', NULL)"))){
				print '<center><div style="color:red">DataBase error</div></center>';
			}
			else{
				print '<center><div style="color:green">You are added</div></center>';
			}
		}
		elseif(isset($_POST[unregisteredVisitor])){
			$query = $mysqli->query("INSERT INTO UnregVisitors VALUES (NULL, '$_POST[first_name]', '$_POST[middle_name]', '$_POST[second_name]', '$_POST[phone]')") or die(mysql_error());
			$forUnregVisitor = $mysqli->query("SELECT MAX(Id) AS Id FROM UnregVisitors");
			$UnregVisitor = $forUnregVisitor->fetch_array();
			
			if($mysqli->query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, NULL, '$UnregVisitor[Id]')")){
				print '<center><div style="color:green">You are added</div></center>';
			}
			else{
				print '<center><div style="color:red">DataBase error</div></center>';
			}
		}
	
		
		print "
			<center><div class='state'><a href='#' class='button blue' onClick='scripts/hiddenShow(\"b2\");' id='button2'>Посмотреть список</a></div></center>
			
			<div id='b1' class='hidden'>
			
				<br>ЗАПИСЬ К ВРАЧУ<br><br>
				
				<input type='button' value='Get' onClick='Get(29);'>
				
				<div id='datePicker'>
				</div>				
			</div>
			
			<div id='b2' class='hidden'>
				<br>СПИСОК ЗАПИСАВШИХСЯ<br><br>
			</div>
			
			<div id='b3' class='hidden'><br>
				<form method='post' action='../phpHendlers/forms/commentAdding.php'>
					<textarea cols='60' rows='10' name='text' required /></textarea><br>
					<input type='hidden' name='docID' value='$data[Emp_ID]'>
					<input type='hidden' name='patID' value='".$_SESSION[userData][ID]."'>
					<input type='submit' name='docComment' value='Enter'>
				</form>
			</div>";
    }
?>
<?
/*
if(!$_GET[selectedDay]){
					print "
					<center><div>";
			
					$query = $mysqli->query("SELECT `Day` FROM Schedule WHERE Emp_ID = '$data[Emp_ID]'") or die($mysqli->error());
					$selectedMonth = '04';
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
				}else{
					print "
					<form name='statement' method='post'>";
					 if($_SESSION['class'] == 4){
						print "
							<input type='datetime-local' name='date'  /><br>
							<input type='submit' name='registeredVisitor' value='Enter'>";
					 }
					 else{
						print "
							<input type='text' name='first_name' id='first_name' maxlength='30' placeholder='First name' size='30' required /><br>
							<input type='text' name='middle_name' id='middle_name' maxlength='30' placeholder='Middle name' size='30' required /><br>
							<input type='text' name='second_name' id='second_name' maxlength='30' placeholder='Second name' size='30' required /><br>
							<input type='text' name='phone' maxlength='30' placeholder='Phone number' size='30'  /><br>
							<input type='datetime-local' name='date'  /><br>
							<input type='submit' name='unregisteredVisitor' value='Enter'>";
					 }
						print " 
						</form>
					</div>";
				}
				*/