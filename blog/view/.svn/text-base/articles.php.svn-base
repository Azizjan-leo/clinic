<?php
	mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("tutorial")or die(mysql_error());
	
		
    $num = 20;
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
		printf('<center><ul><div class="articles_01">
			<li><a href="../index.php?id=%s" title="learn article">
				<div class="articles_02">%s</div>
			</a></li></div></ul></center>
			',$row["id"],$row["title"]);
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