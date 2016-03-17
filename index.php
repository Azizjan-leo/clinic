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
			<a href="index.php"><img src="images/slide_0.jpg" width="1000" height="150" /> </a>
			<a href="index.php" target="_blank"><img src="images/slide_1.jpg" width="1000" height="150" /></a>
			<img src="images/slide_2.jpg" width="1000" height="150" />
			<img src="images/slide_3.jpg" width="1000" height="150" />
		</div> 
		<span class="orbit-caption" id="ezioCaption">Text</span>
		<span class="orbit-caption" id="marcusCaption">Text</span>
   </div>
   <div class="main">
    <div id="topmenu"> <?php include("parts/topMenu.php");?> </div>
    <div id="panel"><img src="images/leftmenu.png" width="60" height="60">
    <div id="leftmenu"><? include("parts/menu.php");?></div>
    </div>
    <div id="action">
			<?php
				if(isset($_GET["content"])or $_GET["item"] or $_GET[docProf] or $_GET[doctor] or $_GET[docList] or $_GET[patient])
				{
					//$_SESSION[t] = false;
					if($_GET["content"] == "home")
					{
						$data = mysql_fetch_array(mysql_query("SELECT Name FROM UserClasses WHERE Id = $_SESSION[class]"));
						$content = 'pages/'. $data[Name] . 'Home';
					}
					else if($_GET[item] or $_GET["content"] == "syst")
					{
						$content = "system/System";
					}
					else if ($_GET[patient] == "all")
					{
						$content = "pages/patient";
					}
					else if($_GET[docProf])
					{
						$content = "pages/".$_GET[docProf];
					}

					else if($_GET["content"])
						$content = "pages/".$_GET[content];

					else if ($_GET[doctor])
						$content = "pages/doctor";
					else if ($_GET[docList])
					{
						$content = "pages/doctor";
					}
					include ($content.'.php');
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
