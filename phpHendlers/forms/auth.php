<?php
	/*if(!$_SESSION["check"])
	{
			if(isset($_POST["submit"]))
			{
			
				$e_login = $_POST["login"];
				$e_password = $_POST["password"];
			
				$query = mysql_query("SELECT * FROM systAccess WHERE name = '$e_login'");
				$user_data = mysql_fetch_array($query);

				if($user_data["password"] == $e_password)
				{	
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
	else 
	{
			unset($_SESSON['name']);
			$_SESSION['systAccess'] = FALSE;
			$_SESSION["check"] = $_SESSION['systAccess'] = $_SESSION['log'] = false;
			unset($_SESSION['log']);
			header("Location: http://clinic:82/index.php");
			die();
			//session_destroy(); //?! Uninitialized session ?!
		
	}*/
	unset($_SESSON['name']);
			$_SESSION['systAccess'] = FALSE;
			$_SESSION["check"] = $_SESSION['systAccess'] = $_SESSION['log'] = false;
			unset($_SESSION['log']);
			header("Location: http://clinic:82/index.php");
			die();
			//session_destroy(); //?! Uninitialized session ?!
?>