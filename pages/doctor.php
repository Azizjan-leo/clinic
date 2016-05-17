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
				</div>";
				$dfs = array(); // Data From Schedule
				$workdays = array();
				while($dataFromSchedule = $result->fetch_array(MYSQLI_ASSOC)){
						$dfs[] = $dataFromSchedule;
						$workdays[] = $dataFromSchedule['Day'];
				}
				//var_dump($workdays);
											
						print "
				<div class='doc_about'>
						<center><big><b>$data[First_Name] $data[Middle_Name] $data[Surname]<br><br>
					$dataFromStaff[Name] of $data[Category] category <br>
					</b>Experience:<b> $years years $months months</b><br>
					<br>
					<table class='brd' id='textCenter'>
						<tr><td></td><td>From</td><td colspan='2'>Lunch</td><td style='text-align: center;'>To</td></tr>Weekdays";
						foreach($dfs as $row) if($row['Day'] == 'Mon') { print "<tr><td>Mon</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Mon", $workdays)) print "<tr><td><font color='red'>Mon</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Tue') { print "<tr><td>Tue</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Tue", $workdays)) print "<tr><td><font color='red'>Tue</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Wed') { print "<tr><td>Wed</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Wed", $workdays)) print "<tr><td><font color='red'>Wed</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Thu') { print "<tr><td>Thu</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Thu", $workdays)) print "<tr><td><font color='red'>Thu</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Fri') { print "<tr><td>Fri</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Fri", $workdays)) print "<tr><td><font color='red'>Fri</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Sat') { print "<tr><td>Sat</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Sat", $workdays)) print "<tr><td><font color='red'>Sat</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						foreach($dfs as $row) if($row['Day'] == 'Sun') { print "<tr><td>Sun</td><td>" . date("H:i",strtotime($row['Start'])) . "</td>"; if($row[Lunch_Start] != $row[Lunch_End]){ print "<td>" . date("H:i",strtotime($row['Lunch_Start'])) . "</td><td>". date("H:i",strtotime($row['Lunch_End']))."</td>";} else print "<td colspan='2'>-</td>"; print "</td><td>".date("H:i", strtotime($row['End']))."</td> </tr>";}
						if (!in_array("Sun", $workdays)) print "<tr><td><font color='red'>Sun</font></td><td colspan='4' style='text-align:center'>Day off</td></tr>";
						
						print "
					</table>";
						$forOneRecp = $mysqli->query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_GET[doctor]");
					$oneRecp = $forOneRecp->fetch_array();
					if($oneRecp['Time']){
						print "<br>Average  reception time: ".$oneRecp['Time']." min";
					}
					$currentMonth = date('m');
					print "</big></center>
				</div>
				<div id='orderView'>
					<center> <big> Order </big> </center> <br>
					<div id='orderAction'>
						<script>
							window.onload = function() {
								orderView($data[Emp_ID]);
							};
						</script>
					</div>
					<center><button class='button' onClick='hiddenShow(\"b1\"); ";
							if(!$_SESSION['log'])
									echo "unregVisitorForm(".$data[Emp_ID].");'";
								else 
									echo "datePicker($data[Emp_ID], ".$_SESSION[userData][ID].", 0);'";
							print " id='button11'>Make an appointment</button></center><br>
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
			<div id='b1' class='hidden'>
			
				<br>ЗАПИСЬ К ВРАЧУ<br><br>
				
				<div id='datePickerMain'></div>
			
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