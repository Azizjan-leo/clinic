<?php
	if($_GET[docList])
	{
		if($_GET[docList] == 'all')	// Choosing a prof of the doctor
		{
			$result = mysql_query("SELECT * FROM Staff WHERE IsDoctor=true") or die(mysql_error());
			$data = mysql_fetch_array($result);
			
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
				while($j<4 and $data = mysql_fetch_array($result));
					
				print '</tr>';
	
			}
			while($data = mysql_fetch_array($result));
			
			echo '</table>';
		}
		else 	// Choosing particular doctor
		{
			$prof = $_GET[docList];
			$result = mysql_query("SELECT * FROM Employee WHERE Prof='$prof'") or die(mysql_error());
			$data = mysql_fetch_array($result);
			
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
					while($j<4 and $data = mysql_fetch_array($result));

					echo '</tr>';
				}
				while($data = mysql_fetch_array($result));
			}
			
			echo '</table>';
		}
	}
	
	if(isset($_GET[doctor])){
		$result = mysql_query("SELECT * FROM Employee WHERE Emp_ID=$_GET[doctor]");
		$data = mysql_fetch_array($result);
		$result = mysql_query("SELECT Name FROM Staff WHERE Id = $data[Prof]");
		$dataFromStaff = mysql_fetch_array($result);
		$result = mysql_query("SELECT * FROM `Schedule` WHERE Emp_ID = $_GET[doctor]") or die(mysql_error());
		$currentDate = date('m/d/Y');
		$diff = abs(strtotime($currentDate) - strtotime($data[CarierStart]));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		
		printf ("
			<div class='docInfo'>
				<div class='doc_photo'> <img src='../images/$data[Image]'> </div>
				<center><big><b>$data[First_Name] $data[Middle_Name] $data[Surname]<br><br>
				$dataFromStaff[Name] of $data[Category] category <br>
				</b>Experience:<b> %d years %d months</b><br>", $years, $months);
				
					print "<br><table class='brd'><tr><td></td><td>From</td><td colspan='2' style='text-align: center;'>Lunch</td><td style='text-align: center;'>To</td></tr>Weekdays";
					
					while($dataFromSchedule = mysql_fetch_array($result)){
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
				
				$oneRecp = mysql_fetch_array(mysql_query("SELECT `Time` FROM `Reception` WHERE Emp_ID = $_GET[doctor]"));
				if($oneRecp['Time']){
					print "<br>Average  reception time: ".$oneRecp['Time']." min";
				}
				print "</big></center><br>$data[CurriculumVitae]<br></div><hr>";
				
		$result = mysql_query("SELECT * FROM Emp_comments WHERE Emp_ID = $data[Emp_ID]") or die(mysql_error());
		$comments = mysql_fetch_array($result);
		if($comments){
			do
			{
				$res = mysql_query("SELECT First_Name, Second_Name FROM patients WHERE ID = $comments[Patient_Id]") or die(mysql_error());
				$patientData = mysql_fetch_array( $res );
				print "<div class='comment_block'>$comments[Text]<br>
				<div class='comment_signiture'>$patientData[First_Name] $patientData[Second_Name]</div></div>";
			}
			while($comments = mysql_fetch_array($result));
		}
		else{
			print '<centr>Nobody leaves a comment<br></center>';
		}
		if($_SESSION["class"] == 4){
			print "<center><div class='state'><a href='#' class='button blue' onClick='hiddenShow(\"b3\");' id='button1'>Leave a comment</a></div></center>";
			print '<i class="fa fa-heart" style="font-size:24px; color: red;"></i>';
		}
		if(isset($_POST[registeredVisitor])){			
			if(!(mysql_query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, '".$_SESSION[userData][ID]."', NULL)"))){
				print '<center><div style="color:red">DataBase error</div></center>';
			}
			else{
				print '<center><div style="color:green">You are added</div></center>';
			}
		}
		elseif(isset($_POST[unregisteredVisitor])){
			$query = mysql_query("INSERT INTO UnregVisitors VALUES (NULL, '$_POST[first_name]', '$_POST[middle_name]', '$_POST[second_name]', '$_POST[phone]')") or die(mysql_error());
			$UnregVisitor = mysql_fetch_array(mysql_query("SELECT MAX(Id) AS Id FROM UnregVisitors"));
			
			if(mysql_query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, NULL, '$UnregVisitor[Id]')")){
				print '<center><div style="color:green">You are added</div></center>';
			}
			else{
				print '<center><div style="color:red">DataBase error</div></center>';
			}
		}
	
		
		if(isset($_POST[docComment])){
			mysql_query("INSERT INTO Emp_comments VALUES (NULL, '$data[Emp_ID]', '".$_SESSION[userData][ID]."', CURRENT_TIMESTAMP, '$_POST[text]')") or die(mysql_error());
		}
		
		print "
			<center><div class='state'><a href='#' class='button blue' onClick='hiddenShow(\"b1\");' id='button1'>Запись на прием</a>     <a href='#' class='button blue' onClick='scripts/hiddenShow(\"b2\");' id='button2'>Посмотреть список</a></div></center>
			<div id='b1' class='hidden'>
				<br>ЗАПИСЬ К ВРАЧУ<br><br>
				<form name='statement' method='post'>";
					 if($_SESSION['class'] == 4){
						 print '<script type="text/javascript" src="scripts/calendar.js">
								calendar.set("date");
						 </script>';
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
			</div>
			<div id='b2' class='hidden'><br>СПИСОК ЗАПИСАВШИХСЯ<br><br>";
				$res = mysql_query("SELECT PatientId, UnregVisitorId FROM `Order` WHERE DoctorId = '$data[Emp_ID]'");
				while($order = mysql_fetch_array($res)){
					if($order[PatientId])
						$ptr = mysql_fetch_array(mysql_query("SELECT First_Name, Second_Name FROM patients WHERE ID = '$order[PatientId]'"));
					else{	
						$ptr = mysql_fetch_array(mysql_query("SELECT First_Name, Second_Name FROM UnregVisitors WHERE Id = '$order[UnregVisitorId]'"));
					}
					print $ptr[First_Name]." ".$ptr[Second_Name]."<br>";
				}
				print "
			</div>
			<div id='b3' class='hidden'><br>
				<form method='post'>
					<textarea cols='60' rows='10' name='text' required /></textarea><br>
					<input type='submit' name='docComment' value='Enter'>
				</form>
			</div>";
    }
?>