<?php
	session_start();
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("tutorial")or die(mysql_error());
	
	if(isset($_POST["submit"])){
		$t = $_POST['title'];
		$m = $_POST['mini'];
		$f = $_POST['full'];
		 // Проверяем, что при загрузке не произошло ошибок
		if ( $_FILES['image']['error'] == 0 ) {
			// Если файл загружен успешно, то проверяем - графический ли он
			if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
			  // Читаем содержимое файла
			  $image = file_get_contents( $_FILES['image']['tmp_name'] );
			  // Экранируем специальные символы в содержимом файла
			  $image = mysql_escape_string( $image );
			  // Формируем запрос на добавление файла в базу данных
			  $query="INSERT INTO `data` VALUES(NULL,'".$t."','".$image."','".$m."','".$f."',NULL)";
			  // После чего остается только выполнить данный запрос к базе данных
			  mysql_query( $query );
			  // Формируем второй запрос дублирующий добавление картинки, но уже в таблицу images
			  $query2="INSERT INTO `images` VALUES(NULL,'".$_FILES['image']['name']."')";
			  // После чего остается только выполнить данный запрос к базе данных
			  mysql_query( $query2 ) or die(mysql_error());
			  // Также отправляем картинку в папку unloaded_images
			  function Uploading($files){
				move_uploaded_file($files['tmp_name'], 'unloaded_images/'.$files['name']);
			  }
			  Uploading($_FILES['image']);
			}
		}
	}
	
	if(isset($_POST["create"]))
			echo '<div class="ind_f">
				<form enctype="multipart/form-data" method="post" action="" accept-charset="cp1251_general_ci">
					<fieldset><table>
						<tr><td><input type="text" name="title" placeholder="| TITLE" required/>&nbsp;&nbsp;<input type="file" name="image" value="Изображение" multiple accept="image/*" required/><br/></td></tr>
						<tr><td><textarea name="mini" placeholder="| MINI TEXT" cols="40" rows="3" required></textarea><br/></td></tr>
						<tr><td><textarea name="full" placeholder="| FULL TEXT" cols="60" rows="6" required></textarea><br/></td></tr>
						<div class="tb_ind"><input type="submit" name="submit" value="Create"></div>
					</table></fieldset>
				</form></div>';		
	if($_SESSION['check']){
		
				print '<div class="button_00"><form action="" method="POST" style="text-align: center">
							<input type="submit" name="create" value="Create new article "/>
						</form></div>';
	}
	
	$num = 3;
	$page = $_GET['page'];
	$result00 = mysql_query("SELECT COUNT(*) FROM data");
	$temp = mysql_fetch_array($result00);
	$posts = $temp[0];
	$total = (($posts - 1) / $num) + 1;
	$total =  intval($total);
	$page = intval($page);
	if(empty($page) or $page < 0) $page = 1;
	if($page > $total) $page = $total;
	$start = $page * $num - $num;		
	// END OF PART1
	
	$query = mysql_query("SELECT * FROM data ORDER By id DESC LIMIT $start, $num");
	$row = mysql_fetch_array($query);
	
	do{
		printf('
			<a href="../index.php?id=%s" title="learn more"><div class="article">
			<img width="150px" height="100" src="view/image.php?id=%s" />
			<h2 class="title" align="center">%s</h2>
			<p>
				%s
			</p><div id="date"><p>%s</p></div>
			</div></a>',
			$row["id"],$row["id"],$row["title"],$row["m_desc"],$row["date"]);
	}
	while($row = mysql_fetch_array($query));
?>
<?
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=index.php?page=1>Fist</a> | <a href=index.php?page='. ($page - 1) .'>Previous</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=index.php?page='. ($page + 1) .'>Next</a> | <a href=index.php?page=' .$total. '>Last</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=index.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=index.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=index.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=index.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=index.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=index.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"bottom_menu\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}
?>