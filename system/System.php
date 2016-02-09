<?php
	if(!$_SESSION["check"]){
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
		print '
			<form action="" method="POST">
				<input type="text" name="login" maxlength="30" placeholder="login" size="30" required /><br>
				<input type="password" name="password" maxlength="11" placeholder="password" size="30" required /><br>
				<input type="submit" name="submit" value="Enter">
			</form>
		';
	}
		
	else
		print '
			 Добавление должности.
			     <form name="staff">
			      <input type="text" name="staff_name" maxlength="30" placeholder="Название должности" size="30" required /><br>
			      <input type="text" name="salary_name" maxlength="11" placeholder="Заработная плата" size="30" required /><br>
			      <input type="submit" value="Отправить">
			     </form>
			 Сотрудники.
			     <form name="emp">
			      <input type="text" name="first_name" maxlength="30" placeholder="Имя" size="30" required /><br>
			      <input type="text" name="middle_name" maxlength="30" placeholder="Фамилия" size="30" required /><br>
			      <input type="text" name="second_name" maxlength="30" placeholder="Отчество" size="30" required /><br>
			      <input type="date" name="date" required /><br>
			      <select name="prof" required><option>пункты</option></select><br>
			      <input type="text" name="phone_num" maxlength="10" placeholder="Номер телефона" size="30" required /><br>
			      <textarea  name="pasport_data" maxlength="50" cols="50" rows="2" placeholder="Паспортные данные" required></textarea><br>
			      <input type="submit" value="Отправить">
			     </form>
				 
			 Добавление симптомов.
			     <form name="symptoms">
			      <input type="text" name="symptom_name" maxlength="30" placeholder="Название симптома" size="30" required /><br>
			      <textarea name="symptom_description" maxlength="100" cols="50" rows="3" placeholder="Описание симптома" required></textarea><br>
			      <input type="submit" value="Отправить">
			     </form>';
?>
