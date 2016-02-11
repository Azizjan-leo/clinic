<?php
	session_start();
	include("/inc/connect.php"); ?>
<html>
    
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title>Мой блог</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
    </head>
    
	<body>
			
		<div class="wrapper">
			<div class="header">
				<a href="index.php"><img src="img/logo2.png" width="1000" /></a>
			</div>
			<div class="content">
				<div class="left">
					<?php
						if(isset($_GET["id"])){
							$id = $_GET["id"];
							$result = mysql_query("SELECT * FROM data WHERE id='$id'") or die(mysql_error());
							$data = mysql_fetch_array($result);
						
							printf('
								<div class="article">
									<h1 align="center">%s</h1>
									<img width="225px" height="165" src="view/image.php?id=%s">
									<p>%s</p><br/>
									<div id="date"><p>%s</p></div>
								</div>',
								$data["title"],$data["id"],$data["f_desc"],$data["date"]);
						}
						
						
						elseif(isset($_GET["content"])){
							$name = $_GET["content"];
							include("view/$name.php");
						}
						else
							include("view/index.php");
					?>
				</div>
				<div class="right">
					<div class="right_menu">
						<?php
							printf('
								<ul>
									<li><a href="../index.php">Main</a></li>
									<li><a href="../index.php?content=%s">Articles</a></li>
									<li><a href="../index.php?content=%s">Videos</a></li>
									<li><a href="../index.php?content=%s">Images</a></li>
									<li><a href="../index.php?content=%s">Archive</a></li>
									<li><a href="../index.php?content=%s">Feedback</a></li></ul>',
									articles,videos,images,archive,feedback);
						?>
						
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div id class="footer">
				<p>Blog <?php printf('<a href="../index.php?content=%s">Ayupov Azizjan</a>',enter);?>(с) 2015</p>
			</div>
		</div>
   
    </body>
</html>