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
  <script src="scripts/scripts.js"></script>
  <script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.orbit.min.js"></script>
 	<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					'bullets': true,
					'timer' : true,
					'animation' : 'horizontal-slide'
				});
			});
		</script>
 </head>
 <body>
  <div class="all">
   <div id="top">
   <div id="featured"> 
			<img src="images/slide_0.jpg" width="1000" height="150" rel="slide_0" />
			<a href="#" target="_blank"><img src="images/slide_1.jpg" width="1000" height="150" /></a>
			<img src="images/slide_2.jpg" rel="slide_2" width="1000" height="150" />
			<img src="images/slide_3.jpg" width="1000" height="150" />
		</div> 
		<span class="orbit-caption" id="slide_0">Text</span>
		<span class="orbit-caption" id="slide_2">Text</span>
   </div>
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
   <div id="footer"><div class="footer_text">FOOTER</div></div>
  </div>
 </body>
</html>
