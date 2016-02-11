<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("tutorial")or die(mysql_error());
	
	if(isset($_POST["out"])){
			unset($_SESSON['name']);
			$_SESSION['check'] = false;
			session_unset();
			session_destroy();
	}
	if(isset($_POST["auth"])){
		
		$e_login = $_POST["login"];
		$e_password = $_POST["password"];
		
		$query = mysql_query("SELECT * FROM user WHERE name = '$e_login'");
		$user_data = mysql_fetch_array($query);

		if($user_data["password"] == $e_password){	
			$_SESSION['name'] = $user_data["name"];
			$_SESSION["check"] = true;
			}
		else 
			echo "Wrong login or password";
			
	}

	
	if($_SESSION['check']){
		echo '<center><br><br><form  method="post" action="">
				<table>
					<tr><td><input type="submit" name="out" value="Out"></td></tr>
				</table>
			  </form></center>';
	}
	else
		echo '<center><br><br><form  method="post" action="">
				<table>
					<tr><td><input type="text" name="login" placeholder="Name" required/></td></tr>
					<tr><td><input type="password" name="password" placeholder="Password" required/></td></tr>
					<tr><td><input type="submit" name="auth" value="ENTER"></td></tr>
				</table>
			  </form></center>';
?>