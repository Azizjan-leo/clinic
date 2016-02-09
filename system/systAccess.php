<?
	if(isset($_POST["out"])){
			unset($_SESSON['name']);
			$_SESSION["check"] = $_SESSION['systAccess'] = false;
			session_unset();
			session_destroy();
	}
	if(isset($_POST["submit"])){
		
		$e_login = $_POST["login"];
		$e_password = $_POST["password"];
		
		$query = mysql_query("SELECT * FROM systAccess WHERE name = '$e_login'");
		$user_data = mysql_fetch_array($query);

		if($user_data["password"] == $e_password){	
			$_SESSION['name'] = $user_data["name"];
			$_SESSION["check"] = $_SESSION['systAccess'] = true;
			}
		else 
			echo "Wrong login or password";
			
	}
?>
<form action="" method="POST">
	<input type="text" name="login" maxlength="30" placeholder="login" size="30" required /><br>
	<input type="password" name="password" maxlength="11" placeholder="password" size="30" required /><br>
	<input type="submit" name="submit" value="Enter">
</form>