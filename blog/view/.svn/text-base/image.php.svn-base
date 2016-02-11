<?php
$connect = mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
    mysql_select_db ("tutorial")or die(mysql_error());
	

  // Здесь $id номер изображения
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		  if ( $id > 0 ) {
			// Выполняем запрос и получаем файл
			$res = mysql_query("SELECT image FROM data WHERE id='$id'") or die(mysql_error());
			if ( mysql_num_rows( $res ) == 1 ) {
			  $image = mysql_fetch_array($res);
			  // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
			  header("Content-type: image/*");
			  // И  передаем сам файл
			  echo $image['image'];
			}
		  }
	}
?>