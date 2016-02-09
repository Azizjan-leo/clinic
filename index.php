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
   <div id="top"><a href="index.php"><img src="images/top.jpg" width="1000" height="100"></a></div>
   <div class="main">
    <div id="topmenu"> <?php include("parts/topMenu.php");?> </div>
    <div id="panel"><img src="images/leftmenu.png" width="60" height="60">
    <div id="leftmenu"><? include("parts/menu.php");?></div>
    </div>
    <div id="action">
			<?php
				if(isset($_GET["content"])){
					include("system/System.php");
				}
				else
					echo "<center>INDEX</center>";
			?>
     <!--Это пока не трогай-->
     <!--Диагнозы.
     <form name="dianoses">
      <input type="text" name="diagnos_name" maxlength="30" placeholder="Название диагноза" size="30" required /><br>
      <textarea name="dignos_description" maxlength="100" cols="50" rows="3" placeholder="Описание диагноза" required></textarea><br>
      <textarea name="symptoms" maxlength="200" cols="50" rows="6" placeholder="Симптомы" readonly required></textarea><br>
      <input type="submit" value="Отправить">
     </form>-->
    </div>
   </div>
   <div class="clean"></div>
   <div id="footer"><center>FOOTER</center></div>
  </div>
 </body>
</html>
