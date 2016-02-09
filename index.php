<?php
	session_start();
	include("phpHendlers/connect.php");
?>
<html>
 <head>
	<title>Clinic</title>
  <meta http-equiv="Content-Type" content="text/html;">
		<link rel="stylesheet" type="text/css" href="styles/css.css" />
		<link rel="stylesheet" type="text/css" href="styles/menu.css" />
 </head>
 <body>
  <div class="all">
   <div id="top"><a href="index.php"><img src="images/top.jpg"></a></div>
   <div class="main">
    <div id="topmenu"> <?php include("parts/topMenu.php");?> </div>
    <div id="menu"><? include("parts/menu.php");?></div>
    <div id="leftmenu"><center>MENU</center></div>
    <div id="leftmenu"><? include("parts/menu.php");?></div>
    <div id="action">
			<?php
				if(isset($_GET["content"])){
					include("system/System.php");
				}
				else
					echo "<center>INDEX</center>";
			?>
    </div>
   </div>
   <div class="clean"></div>
   <div id="footer"><center>FOOTER</center></div>
  </div>
 </body>
</html>
