<?php
	session_start();
	include("phpHendlers/connect.php");
?>
<html>
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<link rel="stylesheet" type="text/css" href="styles/css.css" />
 </head>
 <body>
  <div class="all">
   <div id="top"><a href="index.php"><center><img src="images/topLogo.jpg" height="100" width="400"/></center></a></div>
   <div class="main">
    <div id="topmenu"> <?php include("parts/topMenu.php");?> </div>
    <div id="menu"><? include("parts/menu.php");?></div>
    <div id="action">
			<?php
				if(isset($_GET["content"])){
					include("system/System.php");
				}
				else
					echo "<center>INDEX</center>";
			?>
     <!--��� ���� �� ������, ������ ��������-->
     <!--��������.
     <form name="dianoses">
      <input type="text" name="diagnos_name" maxlength="30" placeholder="�������� ��������" size="30" required /><br>
      <textarea name="dignos_description" maxlength="100" cols="50" rows="3" placeholder="�������� ��������" required></textarea><br>
      <textarea name="symptoms" maxlength="200" cols="50" rows="6" placeholder="��������" readonly required></textarea><br>
      <input type="submit" value="���������">
     </form>-->
    </div>
   </div>
   <div class="clean"></div>
  </div>
  <div id="footer"><center>FOOTER</center></div>
 </body>
</html>
