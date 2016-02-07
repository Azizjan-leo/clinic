<html>
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<link rel="stylesheet" type="text/css" href="styles/css.css" />
 </head>
 <body>
  <div class="all">
   <div id="top"><center>TOP</center></div>
   <div id="topmenu"> <?php printf ('<a href="../index.php?content=%s">Экспертная система</a>',syst);?> </div>
   <div class="main">
    <div id="menu"><center>MENU</center></div>
    <div id="action">
			<?php
				if(isset($_GET["content"])){
					include("system/System.php");
				}
			?>
     <!--Это пока не трогай, завтра поменяем-->
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
  </div>
  <div id="footer"><center>FOOTER</center></div>
 </body>
</html>