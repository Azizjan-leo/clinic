<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$mysqli = new mysqli('localhost', 'root', '123', 'system');
		$phone = '+996' . $_POST[phone];
		
		$mysqli->query("INSERT INTO `system`.`UnregVisitors`(`Id`, `First_Name`, `Middle_Name`, `Second_Name`, `Phone`) VALUES (NULL, '$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$phone')");
		
		$query = $mysqli->query("SELECT MAX(Id) AS Id FROM `system`.`UnregVisitors` WHERE `First_Name` = '$_POST[f_name]' AND `Middle_Name` = '$_POST[m_name]' AND `Second_Name` = '$_POST[l_name]'");		
		
		$entry = $query->fetch_array();
		echo "<script type='text/javascript'>datePicker($_POST[Emp_ID], 0, $entry[Id]);</script> ";
	}
?>