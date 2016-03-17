<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=utf8");
    mysql_select_db ("system")or die(mysql_error());
	if(!$_SESSION["check"])
	{
		$printIdInputForm = '
			<center>
				<form name="userId" action="" method="post">
					<input type="text" name="f_id" placeholder="ID" required /><br>
					<input type="submit" name="f_idSubmit" value="Enter">
				</form>
			</center>';
		function userIdInputForm($isError) 
		{
			if($isError)
			{
				print '<center>Wrong id</center><br>'.$printIdInputForm;
			}
			else
			{
				print $printIdInputForm;
			} 
		}
		function userPasswordInputForm($id, $reenter)
		{
			if($reenter)
			{
				print
				'<center>
					<form name="userPassword" action="" method="post">
						<input type="hidden" name="f_id" placeholder="ID" value="'.$id.'"required />
						<input type="password" name="f_password" placeholder="PASSWORD" required /><br>
						<input type="submit" name="reenter" value="Enter">
					</form>
				</center>';
			}
			else
			{
				print
				'<center>Please, create a password<br>
					<form name="userPassword" action="" method="post">
						<input type="hidden" name="f_id" placeholder="ID" value="'.$id.'"required />
						<input type="password" name="f_password" placeholder="PASSWORD" required /><br>
						<input type="submit" name="f_passwordSubmit" value="Enter">
					</form>
				</center>';
			}
		}
		
		function idValidation($id, $isPassword)
		{
			if($isPassword)
			{
				$reenter = true;
				userPasswordInputForm($id, $reenter);
			}
			else
			{
				$reenter = false;
				userPasswordInputForm($id, $reenter);
			}
		}
		if(isset($_POST[reenter]))
		{
			$id = $_POST[f_id]; // From Users table
			$usersTableData = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE Id = '$id'"));
			
			if(($usersTableData['Class'] == 1) or ($usersTableData['Class'] == 2) or ($usersTableData['Class'] == 3)){
				$data = mysql_fetch_array(mysql_query("SELECT * FROM Employee WHERE Emp_ID = '$id'"));
				
				if($usersTableData[Password] == $_POST[f_password])
				{
					$_SESSION[t] = false;
					$_SESSION["check"] = $_SESSION['log'] = true;
					$class = $_SESSION["class"] = $data['Class'];
					$_SESSION[userName] = $data[First_Name] . " " . $data[Surname];
					$_SESSION[userData] = $data;																//////////// >>>>>>>>>>>>>>
					switch($class)
					{
						case 1:
							$_SESSION[systAccess] = true;
							break;
						case 2:
							$_SESSION[systAccess] = true;
							break;
					}
					print '<script type="text/javascript">window.location.href="../index.php"</script>';
				}
				else
				{
					print '<center><div style="color:red">Wrong password</div><center>';
					$_SESSION[t] = false;
				}
			}
			else if($usersTableData['Class'] == 4){
				if($usersTableData[Password] == $_POST[f_password]){
					$data = mysql_fetch_array(mysql_query("SELECT * FROM patients WHERE Id = '$id'"));
					$_SESSION["check"] = $_SESSION['log'] = true;
					$_SESSION["class"] = 4;
					$_SESSION[userName] = $data[First_Name] . " " . $data[Second_Name];
					$_SESSION[userData] = $data;
					print '<script type="text/javascript">window.location.href="../index.php"</script>';
				}
				else{
					print '<center><div style="color:red">Wrong password</div><center>';
				}
				$_SESSION[t] = false;
			}
		}
		if(isset($_POST[f_idSubmit]))
		{
			
			$id = $_POST[f_id];
			$result = mysql_query("SELECT * FROM Users WHERE Id = '$id'") or die(mysql_error());
			$data = mysql_fetch_array($result);
			if($data[Id]) // There is entries with this id
			{
				$_SESSION[t] = true;
				if(!$data[Password]) // First entering
				{
					idValidation($data[Id], false);
				}
				else
				{
					idValidation($data[Id], true);
				}
			}
			else
			{
				print '<center><div style="color:red">Wrong id</div></center>'.$printIdInputForm;
				$_SESSION[t] = true;				
			}
		}
		
		if(isset($_POST[f_passwordSubmit]))
		{
			$_SESSION[t] = false;
			$id = $_POST[f_id]; // Users.Id
			$password = $_POST[f_password];
			
			if(mysql_query("UPDATE  `Users` SET  `Password` = $password WHERE  `Id` = $id"))			///////////////////////////////////	<<<<<<<<<<<
			{
				$userTableData = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE Id = '$id'"));
				if($userTableData['Class'] == 1 or $userTableData['Class'] == 2 or $userTableData['Class'] == 3){
					$data = mysql_fetch_array(mysql_query("SELECT * FROM Employee WHERE  `Emp_ID` = $id"));
										
					$_SESSION[userName] = $data[First_Name] . " " . $data[Surname];
					$class = $_SESSION["class"] = $data['Class'];
					$_SESSION[userData] = $data;
					switch($class)
					{
						case 1:
							$_SESSION[systAccess] = true;
							break;
						case 2:
							$_SESSION[systAccess] = true;
							break;
						case 3:
							break;
					}
				}
				else if ($userTableData['Class'] == 4){
					$data = mysql_fetch_array(mysql_query("SELECT * FROM patients WHERE  Id = $id"));			
					$_SESSION[userName] = $data[First_Name] . " " . $data[Second_Name];
					$_SESSION["class"] = 4;
					$_SESSION[userData] = $data;
				}
				$_SESSION[t] = false;
				$_SESSION["check"] = $_SESSION['log'] = true;
				print '<script type="text/javascript">window.location.href="../index.php"</script>';
			}				
			else
			{
				echo "<br>ERROR<br>";
			}
		}
		
		if(!$_SESSION[t])
			echo $printIdInputForm;		// First form showing
						
	}
	else
	{
		echo "You are logged<br>";
	}
?>