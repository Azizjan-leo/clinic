<?php
	include("../inc/connect.php");  
	
?>
<html>
    
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<title>Мой блог</title>
		<link rel="stylesheet" type="text/css" href="../css/style2.css" />
    </head>
    
	<body>
			
		<div class="wrapper">
			<div class="header">
				<a href="../index.php"><img src="../img/logo2.png" width="1000" /></a>
			</div>
			<div class="content">
				<div class="left">
					<?php
						$name = $_GET["content"];
						include("pages_content/$name.php");
					?>
				</div>
				<div class="right">
					<div class="right_menu">
						<?php
							printf('
									<a href="../view/page.php?content=%s">Main</a>
									<a href="../view/page.php?content=%s">Articles</a>
									<a href="../view/page.php?content=%s">Video</a>
									<a href="../view/page.php?content=%s">Images</a>
									<a href="../view/page.php?content=%s">Archive</a>
									<a href="../view/page.php?content=%s">Feedback</a>',
									main,articles,videos,images,archive,feedback);
						?>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div id class="footer">
				<p id="text_footer">Blog Ayupov Azizjan(с)2015</p>
			</div>
		</div>
   
    </body>
</html>