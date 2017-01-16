<?php
	if(!$_SESSION["check"])
	{
		$printIdInputForm = '
			<center>
				<form name="userId" action="" method="post">
					<input autofocus type="text" name="f_id" placeholder="ID" required /><br>
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
						<input autofocus type="password" name="f_password" placeholder="PASSWORD" required /><br>
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
						<input autofocus type="password" name="f_password" placeholder="PASSWORD" required /><br>
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
			$query = $mysqli->query("SELECT `Class`, `Password` FROM Users WHERE Id = '$id'");
			$usersTableData = $query->fetch_array();
			if($usersTableData[Password] == $_POST[f_password])
			{
				if( ($usersTableData['Class'] == 1) or ($usersTableData['Class'] == 2) )
				{
					$query = $mysqli->query("SELECT * FROM Employee WHERE Emp_ID = '$id'");
					$data = $query->fetch_array();
					
						$_SESSION[t] = false;
						$_SESSION["check"] = $_SESSION['log'] = true;
						$class = $_SESSION["class"] = $data['Class'];
						$_SESSION[userName] = $data[First_Name] . " " . $data[Surname];
						$_SESSION[userData] = $data;
						$_SESSION[userData][Second_Name] = $data[Surname];
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
				else if($usersTableData['Class'] == 4)
				{
					$query = $mysqli->query("SELECT First_Name, Second_Name, ID FROM patients WHERE Id = '$id'");
					$_SESSION[userData] = $query->fetch_array();
					$_SESSION["check"] = $_SESSION['log'] = true;
					$_SESSION["class"] = 4;
					$_SESSION[userName] = $_SESSION[userData][First_Name] . " " . $_SESSION[userData][Second_Name];
					$_SESSION[t] = false;
					print '<script type="text/javascript">window.location.href="../index.php"</script>';
				}
				else
				{
					print '<center><div style="color:red">Unknown user class</div><center>';
					$_SESSION[t] = false;
				}
			}
			else
			{
				print '<center><div style="color:red">Wrong password</div><center>';
				$_SESSION[t] = false;
			}
		}
		
		if(isset($_POST[f_idSubmit]))
		{
			
			$id = $_POST[f_id];
			$query = $mysqli->query("SELECT * FROM Users WHERE Id = '$id'");
			$data = $query->fetch_array(MYSQLI_ASSOC);
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
			
			if($mysqli->query("UPDATE  `Users` SET  `Password` = $password WHERE  `Id` = $id"))			///////////////////////////////////	<<<<<<<<<<<
			{
				$query = $mysqli->query("SELECT * FROM Users WHERE Id = '$id'");
				$userTableData = $query->fetch_array(MYSQLI_ASSOC);
				if($userTableData['Class'] == 1 or $userTableData['Class'] == 2 or $userTableData['Class'] == 3){
					$query = $mysqli->query("SELECT * FROM Employee WHERE  `Emp_ID` = $id");
					$data = $query->fetch_array(MYSQLI_ASSOC);										
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
					$query = $mysqli->query("SELECT * FROM patients WHERE  Id = $id");
					$_SESSION[userData] = $query->fetch_array(MYSQLI_ASSOC);			
					$_SESSION[userName] = $_SESSION[userData][First_Name] . " " . $_SESSION[userData][Second_Name];
					$_SESSION["class"] = 4;
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