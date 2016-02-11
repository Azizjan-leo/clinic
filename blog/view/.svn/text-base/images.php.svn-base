<?php
	$connect = mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
	mysql_select_db("tutorial") or die(mysql_error());
function Uploading($files){
	for($i = 0; $i < count($files['name']); $i++){
		if($files['error'][$i] == 0){
			if($files['size'][$i] <= 100000){
				if(
					$files['type'][$i] == "image/jpeg" ||
					$files['type'][$i] == "image/jpg" ||
					$files['type'][$i] == "image/gif" ||
					$files['type'][$i] == "image/bmp" ||
					$files['type'][$i] == "image/png"
				){
					move_uploaded_file($files['tmp_name'][$i], 'unloaded_images/'.$files['name'][$i]);
				}
				else
					echo "Unknown format";
			}
			else
				echo "Too large file";
		
					
				  
			// Формируем запрос на добавление картинки
			$query="INSERT INTO `images` VALUES(NULL,'".$files['name'][$i]."')";
			// После чего остается только выполнить данный запрос к базе данных
			mysql_query( $query ) or die(mysql_error());
		}
	}
	
}

if(isset($_POST['send-request']))
	Uploading($_FILES['load']);
	
	if(isset($_POST["new_image"]))
			echo '
				<form enctype="multipart/form-data" method="POST" action="" >
					<fieldset>
						<input type="file" name="load[]" multiple accept="image/*" value="Изображение" required /><br/>
						<input type="submit" name="send-request" value="Upload">
					</fieldset>
				</form>';
				
	if($_SESSION['check']){
		
				print '<form action="" method="POST" style="text-align: center">
							<br><input type="submit" name="new_image" value="New image"/><br><br>
						</form>';
	}
	
	
		$result = mysql_query("SELECT * FROM images ORDER By id DESC") or die(mysql_error());
			$data = mysql_fetch_array($result);
			if($data!=0){
				
						do{
							$file = $data["name"];
							$info = pathinfo($file); 
							$filename = basename($file,'.'.$info['extension']);
							printf('<div class="color_img">
								<center><br><img id="images" src="unloaded_images/%s" width="400" class="zoom" title="%s" /></center><br>
								</div>
							',$data["name"],$filename);
						}
						while($data = mysql_fetch_array($result));		
			}
?>
