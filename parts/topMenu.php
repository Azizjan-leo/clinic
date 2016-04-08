<?
	printf	('<nav id="menu-wrap">
      <ul id="menu">
       <li><a href="../index.php?docList=%s">Doctors</a><ul>',all);
	$result = $mysqli->query("SELECT * FROM Staff") or die(mysql_error());
	
	while($data = $result->fetch_array()){	printf ('<li><a href="../index.php?docList=%s">'.$data[Name].'s</a></li>', $data[Id]);	}
	
	while($data = $result->fetch_array(MYSQLI_NUM));
	print '</ul>';
	if($_SESSION["class"] == 2)
	{
		printf ('<li><a href="../index.php?patient=%s">Patients</a></li>', all);
	}
	printf('			
			<li><a href="#">Menu</a>
				<ul>
					<li><a href="../index.php?content=%s">Comments</a></li>
					<li><a href="#">Подменю</a></li>
					<li><a href="#">Подменю</a></li>
					<li><a href="#">Подменю</a></li>
				</ul>
			</li>',comments);
	if($_SESSION["systAccess"])
	{
		printf('<li><a href="../index.php?content=%s">Expert system</a></li>',syst);
	}
	if($_SESSION['log']) // if user is logged even like ghoust 
	{
		$userName = $_SESSION[userName];
		printf('			
			<li><a href="../index.php?content=%s">'.$userName.'</a>
				<ul>
					<li><a href="../index.php?content=%s">LogOut</a></li>
				</ul>
			</li>',home,logOut);
	}	
	else
		printf ('<li><a href="../index.php?content=%s">LogIn</a></li></ul></nav>',logIn);
	$result->free();
?>