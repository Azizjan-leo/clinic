<?php if(!$_SESSION['log']) print '<script type="text/javascript">window.location.href="../index.php"</script>'; ?>
<?php
	print '
		<table>
			<tr>
				<td class="homeAction">
					';
    $query = $mysqli->query("SELECT `Emp_ID` FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'");
	$schedule = $query->fetch_array(MYSQLI_ASSOC);
	if(!$schedule[Emp_ID] and !$_GET[scheduleFormFilling]){
		echo '<a href="../index.php?content=home&scheduleFormFilling=1" style="color: red">Please, create your schedule</a>';
	}
	
	if(isset($_GET[scheduleFormFilling]) or isset($_POST[editScheduleForm])){
		if(isset($_POST[scheduleSubmitButton1])){
			$days = array();
			for($i = 0; $i<7; $i++)
				if($_POST[$i])
					$days[] = $_POST[$i];
			if(isset($days)){
				$ee = "&days[]=" . implode("&days[]=", array_map('urlencode', $days));
				print "<script type='text/javascript'>window.location.href='../index.php?content=home&scheduleFormFilling=2$ee'</script>";
			}else{
				echo "<p style='color: red;'>Select one at least</p>";
			}
		}
		if($_GET[scheduleFormFilling] == 1){
			print ' <div class="scheduleEditForm1">
						<form  method="POST" name="scheduleEditForm1">
							<table>
								<tr>
									<th colspan="7">Choose your weekdays</th>
								</tr>
								<tr>
									<td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>Sun</td>
								</tr>
								<tr>
									<td><input type="radio" name="0" value="Mon"></td>
									<td><input type="radio" name="1" value="Tue"></td>
									<td><input type="radio" name="2"  value="Wed"></td>
									<td><input type="radio" name="3" value="Thu"></td>
									<td><input type="radio" name="4" value="Fri"></td>
									<td><input type="radio" name="5" value="Sat"></td>
									<td><input type="radio" name="6" value="Sun"></td>
								</tr>
								<tr>
									<td colspan="7"><input type="submit" name="scheduleSubmitButton1" value="Enter"></td>
								</tr>
							</table>
						</form>
					</div>';
		}
		if(isset($_POST[allAsOne])){
			print '<div class="scheduleEditForm">
					<form  method="POST" name="allAsOneForm" action="../phpHendlers/forms.php">
						<table>
							<tr><th>Day</th><th>Start</th><th>Lunch Start</th><th>Lunch End</th><th>End</th></tr>
							<tr><td>-</td><td><input type="time" name="start"></td><td><input type="time" name="lunchStart"></td><td><input type="time" name="lunchEnd"></td><td><input type="time" name="end"></td></tr>
							<tr><td colspan="3">Time you need for one reception</td><td colspan="2"><input id="shortInputField" type="text" name="oneReception">min</td></tr>
							<tr><td colspan="5"><input type="submit" name="allAsOneSubmit" value="Enter"></td></tr>
						</table>
					</form>
				   </div>';
		}else if($_GET[scheduleFormFilling] == 2){
			$_SESSION[days] = $_GET[days];
			print	'<div class="scheduleEditForm">
			<form  method="POST" name="scheduleEditForm" action="../phpHendlers/forms.php">
				<table>
					<tr><th>Day</th><th>Start</th><th>Lunch Start</th><th>Lunch End</th><th>End</th></tr>';
					for($i=0; $i < count($_GET[days]); $i++){
						print '<tr><td>'.$_GET[days][$i].'</td><td><input type="time" name="start'.$i.'"></td><td><input type="time" name="lunchStart'.$i.'"></td><td><input type="time" name="lunchEnd'.$i.'"></td><td><input type="time" name="end'.$i.'"></td></tr>';
					}
					print '
					<tr><td colspan="3">Time you need for one reception</td><td colspan="2"><input id="shortInputField" type="text" name="oneReception">min</td></tr>
					<tr><td colspan="5"><input type="submit" name="scheduleSubmitButton" value="Enter"></td></tr>
				</table>
			</form>
			You can also fill
			<form method="POST">
				<input type="submit" name="allAsOne" value="All as one">
			</form>
			</div> <!--The div opens in if(!$schedule[Start]) statement below-->
			';	
		}
		if(isset($_POST[editScheduleForm])){
			$res = $mysqli->query("SELECT Day FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			$days = array();
			while($row =  $res->fetch_array(MYSQLI_ASSOC)) {
				$days[] = $row[Day];
			}
			print ' <div class="scheduleEditForm1">
						<form  method="POST" name="scheduleEditForm1">
							<table>
								<tr>
									<th colspan="7">Choose your weekdays</th>
								</tr>
								<tr>
									<td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>Sun</td>
								</tr>
								<tr>';
									for($i = 0; $i < 7; $i++){
										switch($i){
											case 0:	print '<td><input type="checkbox" name="0" value="Mon"';if(in_array("Mon",$days)) print ' checked'; 
												break;
											case 1:	print '<td><input type="checkbox" name="1" value="Tue"';if(in_array("Tue",$days)) print ' checked'; 
												break;
											case 2:	print '<td><input type="checkbox" name="2" value="Wed"';if(in_array("Wed",$days)) print ' checked'; 
												break;
											case 3:	print '<td><input type="checkbox" name="3" value="Thu"';if(in_array("Thu",$days)) print 'checked'; 
												break;
											case 4:	print '<td><input type="checkbox" name="4" value="Fri"';if(in_array("Fri",$days)) print 'checked'; 
												break;
											case 5:	print '<td><input type="checkbox" name="5" value="Sat"';if(in_array("Sat",$days)) print 'checked'; 
												break;
											case 6:	print '<td><input type="checkbox" name="6" value="Sun"';if(in_array("Sun",$days)) print 'checked'; 
												break;										
										}
										echo '></td>';
									}
									print '
								</tr>
								<tr>
									<td colspan="7">
										<input type="submit" name="scheduleEditSubmitButton" value="Enter">
									</td>
								</tr>
							</table>
						</form>
					</div>';
		}
		if($_GET[scheduleFormFilling] == 3){
			$res = mysql_query("SELECT Day FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			$DBd = array();
			while(($row =  mysql_fetch_assoc($res))) {
				if(in_array($row[Day], $_GET[days]))
					$DBd[] = $row[Day];
			}
			
			$_SESSION[days] = $_GET[days];
			print	'<div class="scheduleEditForm">
			<form  method="POST" name="scheduleEditForm" action="../phpHendlers/forms.php">
				<table>
					<tr><th>Day</th><th>Start</th><th>Lunch Start</th><th>Lunch End</th><th>End</th></tr>';
					for($i=0; $i < count($_GET[days]); $i++){
						print '<tr><td>'.$_GET[days][$i].'</td><td><input type="time" name="start'.$i.'"';
						if(in_array($_GET[days][$i],$DBd)){
							$res = mysql_query("SELECT * FROM Schedule WHERE `Emp_ID` = '".$_SESSION[userData][Emp_ID]."' AND `Day` = '".$_GET[days][$i]."'");
							$row = mysql_fetch_array($res);
							print " value='$row[Start]'></td><td><input type='time' name='lunchStart$i' value='$row[Lunch_Start]'></td><td><input type='time' name='lunchEnd$i' value='$row[Lunch_End]'></td><td><input type='time' name='end$i' value='$row[End]'></td></tr>";
						}else{
							print '>
						</td><td><input type="time" name="lunchStart'.$i.'"></td><td><input type="time" name="lunchEnd'.$i.'"></td><td><input type="time" name="end'.$i.'"></td></tr>';
						}
					}
					$res = mysql_fetch_array(mysql_query("SELECT Time FROM Reception WHERE `Emp_ID` = '".$_SESSION[userData][Emp_ID]."'"));
					print '
					<tr><td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;Time you need for one reception</td><td colspan="2"><input id="shortInputField" type="text" value="'.$res['Time'].'" name="oneReception">min</td></tr>
					<tr><td colspan="5"><input type="submit" name="scheduleEditSubmitButton3" value="Enter"></td></tr>
				</table>
			</form></div> <!--The div opens in if(!$schedule[Start]) statement below-->
			';	
		}
	}
	if(isset($_POST[scheduleEditSubmitButton])){
		$days = array();
		for($i = 0; $i<7; $i++)
			if($_POST[$i])
				$days[] = $_POST[$i];
		if(isset($days)){
			$ee = "&days[]=" . implode("&days[]=", array_map('urlencode', $days));
			print "<script type='text/javascript'>window.location.href='../index.php?content=home&scheduleFormFilling=3$ee'</script>";
		}else{
			echo "<p style='color: red;'>Select one at least</p>";
		}
	}
	if(isset($_GET[massage])){
		if($_GET[massage] == "NewId"){
			$id = $_GET[NewId]; 
			echo "<p style='color: green'>New entry has been added</p>
			<big>ID: <textarea cols='11' rows='1'>$id</textarea><br><br>";
		}
		if($_GET[massage] == "NewSchedule"){
			$result = mysql_query("SELECT * FROM `Schedule` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'") or die(mysql_error());
			print "<br><center><table class='brd'><tr><td></td><td>From</td><td colspan='2' style='text-align: center;'>Lunch</td><td style='text-align: center;'>To</td></tr>";
				echo "<font color='green'>New Schedule:</font>";
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
				print "</table></center>";
		}
		if(isset($_GET[NewReception]) and $_GET[NewReception] == true){
			$t = mysql_fetch_array(mysql_query("SELECT Time FROM `Reception` WHERE Emp_ID = '".$_SESSION[userData][Emp_ID]."'"));
			echo "<br><font color='green'>New Reception Time:</font> ".$t['Time']."min";
		} 
	}
	if(isset($_POST[newPatientForm])){
		print '
			<form enctype="multipart/form-data" accept-charset="utf8" method="POST" name="newPatientForm" action="../phpHendlers/forms.php">
				<input type="text" maxlength="30" name="First_Name" placeholder="First Name"  required/> <br>
				<input type="text" maxlength="30" name="Middle_Name" placeholder="Middle Name"  /> <br>
				<input type="text" maxlength="30" name="Second_Name" placeholder="Second Name"  required/> <br>
				Birth Date <input type="date" name="Birth_Date" style="width: 296px;" required/> <br>
				Man <input type="radio" name="Gender" value="1"> Woman<input type="radio" name="Gender" value="0"> <br>
				Virus <input type="checkbox" name="Virus" value="1" > <br>
				Insurance Category <select name="Insurance_Category"  style="width: 227px;" required><option value="0">None</option><option value="1">Invalid 1</option><option value="2">Invalid 2</option><option value="3">Invalid 3</option><option value="4">Pensioner</option><option value="5">Veteran</option></select><br>
				Diagnosis <select name="Diagnosis"  style="width: 297px;">'; $sql = mysql_query("SELECT * FROM Diagnosis"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['ID'].">" . $row['Name'] . "</option>";}	  print '</select><br>
				<input type="text" name="Prof" maxlength="25" placeholder="Profession"  required/> <br>
				<input type="text" name="Address" maxlength="70" placeholder="Address" required /> <br>
				<input type="text" name="Phone" maxlength="20" placeholder="Phone"  required/> <br>
				<input type="email" name="Email" maxlength="30" placeholder="Email" required/><br>
				Photo <input type="file" name="image" value="image" multiple accept="image/*"  required/></br>
				<textarea  name="Comment" maxlength="150" cols="50" rows="3" placeholder="Comment"></textarea><br>
				<input type="submit" name="newPatientFormSubmit" value="Enter">
			</form>
		';
	}
	if(isset($_POST[redirToMyPage])){
		$dir = $_SESSION[userData][Emp_ID];
		print "<script type='text/javascript'>window.location.href='../index.php?doctor=$dir'</script>";
	}
	if(isset($_POST[myPatients])){
		$query = $mysqli->query("SELECT * FROM patients WHERE Care_Doctor = $_SESSION[userData][Emp_ID]");
		
	}
	print '
				</td>
				<td class="homeMenu">
					<form method="POST">
						<input class="homeMenuButton" type="submit"  name="newPatientForm" value="Patient registering +">';
						if($schedule[Emp_ID]){
							echo "<input class='homeMenuButton' type='submit'  name='editScheduleForm' value='Edit my schedule &#128393;'>";
						}
						print'
						<input class="homeMenuButton" type="submit"  name="redirToMyPage" value="My page">
						<input class="homeMenuButton" type="submit" name="myPatients" value="My patients">
					</form>
				</td>
			</tr>
		</table>
	';
?>