<div align=center><?php
	include("phpHendlers/connect.php");
	$_SESSION['form'] = true;
	//Hendlers
		if(isset($_POST['position']) and $_SESSION['form']){
			$name = $_POST['name'];
			$salary = $_POST['salary'];
			$unit = $_POST['unit'];
			$query="INSERT INTO `Staff` VALUES(NULL,'".$name."','".$salary."','".$unit."')";
			mysql_query( $query );
			$_POST['position'] = false;
			$_SESSION['form'] = false;
		}
		if(isset($_POST['employee']) and $_SESSION['form']){
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$middle_name = $_POST['middle_name'];
			$date = $_POST['date'];
			$prof = $_POST['prof'];
			$phone_num = $_POST['phone_num'];
			$pasport_data = $_POST['pasport_data'];
			$query="INSERT INTO `Employee` VALUES(NULL,'".$name."','".$surname."','".$middle_name."','".$prof."','".$phone_num."','".$pasport_data."','".$date."')";
			mysql_query( $query );
			$_POST['position'] = false;
			$_SESSION['form'] = false;
		}
		if(isset($_POST['symptom']) and $_SESSION['form']){
			$name = $_POST['name'];
			$description = $_POST['description'];
			$query="INSERT INTO `Symptoms` VALUES(NULL,'".$name."','".$description."')";
			mysql_query( $query );
			$_POST['position'] = false;
			$_SESSION['form'] = false;
		}
		if(isset($_POST['diagnosis']) and $_SESSION['form']){
			$name = $_POST['name'];
			$description = $_POST['description'];
			$query="INSERT INTO `Diagnosis` VALUES(NULL,'".$name."','".$description."')";
			mysql_query( $query );
			$_POST['position'] = false;
			$_SESSION['form'] = false;
		}		
	//End
	if(!$_SESSION["check"]){
		if(isset($_POST["submit"])){
		
			$e_login = $_POST["login"];
			$e_password = $_POST["password"];
		
			$query = mysql_query("SELECT * FROM systAccess WHERE name = '$e_login'");
			$user_data = mysql_fetch_array($query);

			if($user_data["password"] == $e_password){	
				$_SESSION['name'] = $user_data["name"];
				$_SESSION["check"] = $_SESSION['systAccess'] = $_SESSION['log'] = true;
				print '<script>window.location.reload()</script>';
			}
			else 
				echo "Wrong login or password";
			
		}
		print '
			<form action="" method="POST">
				<input type="text" name="login" maxlength="30" placeholder="login" size="30" required /><br>
				<input type="password" name="password" maxlength="11" placeholder="password" size="30" required /><br>
				<input type="submit" name="submit" value="Enter">
			</form>	';
	}
		
	else{
		if(isset($_GET['item']) and $_SESSION['form']){
			$item = $_GET['item'];
			if($item == "position"){
				print 'Position adding.
			     <form name="staff" method="post">
			      <input type="text" name="name" maxlength="30" placeholder="Position name" size="30" required /><br>
			      <input type="text" name="salary" maxlength="11" placeholder="Salary" size="30" required /><br>
				  <select name="unit"><option value="1">Dollar</option><option value="2">Euro</option><option value="3">Ruble</option><option value="4">Som</option></select><br>
			      <input type="submit" name="position" value="Enter">
			     </form>';
				printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',employee);
				printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
				printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
				$_SESSION['form'] = false;
			}
			else if($item == "employee"){
				print 'Employee.
			     <form name="emp" method="post">
			      <input type="text" name="name" maxlength="30" placeholder="Name" size="30" required /><br>
			      <input type="text" name="surname" maxlength="30" placeholder="Surname" size="30" required /><br>
			      <input type="text" name="middle_name" maxlength="30" placeholder="Middle name" size="30" required /><br>
			      Receipt date<br>
				  <input type="date" name="date" required /><br>
			      <select name="prof">';
				  $sql = mysql_query("SELECT Name FROM Staff"); while ($row = mysql_fetch_array($sql)){ echo "<option value=".$row['Name'].">" . $row['Name'] . "</option>";}
				  print '</select><br>
			      <input type="text" name="phone_num" maxlength="15" placeholder="Telephone" size="30" required /><br>
			      <textarea  name="pasport_data" maxlength="50" cols="50" rows="2" placeholder="Passort data" required></textarea><br>
			      <input type="submit" name="employee" value="Enter">
			     </form>';
				printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
				printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
				printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
			}
			else if($item == "symptom"){
				print 'Symptom adding.
			     <form name="symptoms" method="post">
			      <input type="text" name="name" maxlength="50" placeholder="Symptom name" size="30" required /><br>
			      <textarea name="description" maxlength="200" cols="50" rows="3" placeholder="Description" required></textarea><br>
			      <input type="submit" name="symptom" value="Enter">
			     </form>';
				printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
				printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',emloyee);
				printf ('<a href="../index.php?item=%s" class="button blue">New diagnosis</a><br>',diagnosis);
			}
			else if($item == "diagnosis"){
				print 'Diagnosis adding.
				 <form name="dianoses" method="post" >
				  <input type="text" name="name" maxlength="50" placeholder="Diagnosis name" size="30" required /><br>
				  <textarea name="description" maxlength="500" cols="50" rows="3" placeholder="Description" required></textarea><br>
				  <input type="submit" name="diagnosis" value="Enter">
				 </form>';
				printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>',position);
				printf ('<a href="../index.php?item=%s" class="button blue">New employee</a><br>',emloyee);
				printf ('<a href="../index.php?item=%s" class="button blue">New symptom</a><br>',symptom);
			}
		}
		else{
			printf ('<a href="../index.php?item=%s" class="button blue">New position</a><br>
					 <a href="../index.php?item=%s" class="button blue">New employee</a><br>
					 <a href="../index.php?item=%s" class="button blue">New symptom</a><br>
					 <a href="../index.php?item=%s" class="button blue">New diagnosis</a>',position,employee,symptom,diagnosis);						 
		}
	}
				 
?></div>
