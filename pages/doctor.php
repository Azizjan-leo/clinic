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
		print "
		<div class='docInfo'>
		  <div class='doc_photo'> <img height='350' width='300' src='../images/$data[Image]'> </div>
			 <center><big>$data[First_Name] $data[Middle_Name] $data[Surname]<br><br>
			 $dataFromStaff[Name] of $data[Category] category <br><br>";
		$currentDate = date('m/d/Y');
		$diff = abs(strtotime($currentDate) - strtotime($data[CarierStart]));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		printf("Experience: %d years, %d months</big></center><br>", $years, $months);
		print $data[CurriculumVitae];
		print '</div><hr>';
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
			print '<centr>Nobody leave a comment<br></center>';
		}
		if($_SESSION["class"] == 4){
			print "<center><div class='state'><a href='#' class='button blue' onClick='hiddenShow(\"b3\");' id='button1'>Leave a comment</a></div></center>";
		}
		if(isset($_POST[registeredVisitor])){			
			if(!(mysql_query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, '".$_SESSION[userData][ID]."', '', '$_POST[phone_number]')"))){
				print '<center><div style="color:red">Error</div></center>';
			}
		}
		elseif(isset($_POST[unregisteredVisitor])){
			if($_POST[id]){
				$eId = $_POST[id]; 
				$query = mysql_query("SELECT * FROM patients WHERE ID ='$_POST[id]'");
				$patientData = mysql_fetch_array($query);
				
				if($patientData){
					//INSERT INTO `system`.`Visitors` (`Id`, `Patient_ID`, `First_Name`, `Second_Name`, `Phone`) VALUES (NULL, NULL, 'Kamilla', 'Munurova', '+996702942932');
					if((mysql_query("INSERT INTO `Order` VALUES (NULL, '$data[Emp_ID]', NULL, '$_POST[id]', '', '$_POST[phone_number]')") or die(mysql_error()))){
						//echo "Success ".$_POST[id];
					}
				}else{
					print '<center><div style="color:red">Wrong id</div></center>';
				}
				
			}else{
				echo "Enter your ID!<br>";
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
						print "
							<input type='text' name='phone_number' maxlength='30' placeholder='Phone number' size='30'  /><br>
							<input type='datetime-local' name='date'  /><br>
							<input type='submit' name='registeredVisitor' value='Enter'>";
					 }
					 else{
						print "
							<input type='text' name='id' id='card_number' maxlength='10' placeholder='ID' size='30' required /><br>
							<input type='text' name='first_name' id='first_name' maxlength='30' placeholder='First name' size='30' required /><br>
							<input type='text' name='middle_name' id='middle_name' maxlength='30' placeholder='Middle name' size='30' required /><br>
							<input type='text' name='second_name' id='second_name' maxlength='30' placeholder='Second name' size='30' required /><br>
							<input type='text' name='phone_number' maxlength='30' placeholder='Phone number' size='30'  /><br>
							<input type='datetime-local' name='date'  /><br>
							<input type='submit' name='unregisteredVisitor' value='Enter'>";
					 }
					print " 
				</form>
			</div>
			<div id='b2' class='hidden'><br>СПИСОК ЗАПИСАВШИХСЯ<br><br>";
				$res = mysql_query("SELECT PatientId, VisitorId FROM `Order` WHERE DoctorId = '$data[Emp_ID]'");
				while($order = mysql_fetch_array($res)){
					if($order[PatientId])
						$ptr = mysql_fetch_array(mysql_query("SELECT First_Name, Second_Name FROM patients WHERE ID = '$order[PatientId]'"));
					else{	
						$ptr = mysql_fetch_array(mysql_query("SELECT First_Name, Second_Name FROM Visitors WHERE Id = '$order[VisitorId]'"));
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