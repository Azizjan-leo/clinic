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
			$id = $_POST[f_id];
						
			$query = mysql_query("SELECT * FROM Employee WHERE Emp_ID = '$id'") or die(mysql_error());
			$data = mysql_fetch_array($query);
			$password = $data[Password];
			if($password == $_POST[f_password])
			{
				$_SESSION[t] = false;
				$_SESSION["check"] = $_SESSION['log'] = true;
				$class = $_SESSION["class"] = $data['Class'];
				$_SESSION[userName] = $data[First_Name] . " " . $data[Surname];
				$_SESSION[userData] = $data;
				switch($class)
				{
					case "Doctor":
						$_SESSION[systAccess] = true;
						break;
					case "Admin":
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
		if(isset($_POST[f_idSubmit]))
		{
			
			$id = $_POST[f_id];
			$result = mysql_query("SELECT * FROM Employee WHERE Emp_ID = '$id'") or die(mysql_error());
			$data = mysql_fetch_array($result);
			if($data[Emp_ID]) // There is entries with this id
			{
				$_SESSION[t] = true;
				if(!$data[Password]) // First entering
				{
					idValidation($data[Emp_ID], false);
				}
				else
				{
					idValidation($data[Emp_ID], true);
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
			$id = $_POST[f_id];
			$password = $_POST[f_password];

			if(mysql_query("UPDATE  `Employee` SET  `Password` = $password WHERE  `Emp_ID` = $id"))
			{
				$query = mysql_query("SELECT * FROM Employee WHERE  `Emp_ID` = $id");
				$data = mysql_fetch_array($query);
				$_SESSION[t] = false;
				$_SESSION["check"] = $_SESSION['log'] = true;
				$_SESSION[userName] = $data[First_Name] . " " . $data[Surname];
				$class = $_SESSION["class"] = $data['Class'];
				switch($class)
				{
					case "Doctor":
						$_SESSION[systAccess] = true;
						break;
					case "Admin":
						$_SESSION[systAccess] = true;
						break;
				}
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