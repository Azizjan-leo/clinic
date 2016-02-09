<?php
	session_start();
	include("phpHendlers/connect.php");
?>
<html>
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<link rel="stylesheet" type="text/css" href="styles/css.css" />
  <link rel="stylesheet" type="text/css" href="styles/menu.css" />
 </head>
 <body>
  <div class="all">
   <div id="top"><a href="index.php"><img src="images/topLogo.jpg" height="100" width="400"/></a></div>
   <div class="main">
<<<<<<< HEAD
    <div id="topmenu"> <?php include("parts/topMenu.php");?> </div>
    <div id="menu"><? include("parts/menu.php");?></div>
=======
    <div id="topmenu">
     <nav id="menu-wrap">
      <ul id="menu">
       <li><?php printf ('<a href="../index.php?content=%s">Р­РєСЃРїРµСЂС‚РЅР°СЏ СЃРёСЃС‚РµРјР°</a>',syst);?></li>
       <li><a href="#">РњРµРЅСЋ2</a>
        <ul>
         <li><a href="#">РџРѕРґРјРµРЅСЋ1</a></li>
         <li><a href="#">РџРѕРґРјРµРЅСЋ2</a></li>
         <li><a href="#">РџРѕРґРјРµРЅСЋ3</a></li>
         <li><a href="#">РџРѕРґРјРµРЅСЋ4</a></li>
        </ul>
       </li>
       <li><a href="#">РњРµРЅСЋ3</a></li>
       <li><a href="#">РњРµРЅСЋ3</a></li>
       <li><a href="#">РњРµРЅСЋ3</a></li>
      </ul>
      </nav>
    </div>
    <div id="leftmenu"><center>MENU</center></div>
>>>>>>> d410730b9ec839b538c5f81d658edf1a9d0a4a59
    <div id="action">
			<?php
				if(isset($_GET["content"])){
					include("system/System.php");
				}
				else
					echo "<center>INDEX</center>";
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
