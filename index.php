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
  <script src="scripts/showhide.js"></script>
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
				if(isset($_GET["content"])or $_GET["item"]){
					$content = $_GET["content"];
					if($content == "syst" or $_GET["item"])
						include('system/system.php');
					else
						include('pages/'.$content.'.php');
				}
				else
					echo "INDEX";
			?>
    </div>
   </div>
   <div class="clean"></div>
   <div id="footer"><center>FOOTER</center></div>
  </div>
 </body>
</html>
