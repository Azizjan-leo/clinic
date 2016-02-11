<?php
if(isset($_POST["upload"])){
	echo '<center><br><br><form method="POST" enctype="multipart/form-data"><table>
			<fieldset>
			<tr><td><input type="file" name="load[]" multiple accept="video/*" required/></td></tr>
			<tr><td><input type="text" name="title" placeholder="| NAME" required/></td></tr>
			<tr><td><input type="submit" name="send-request" value="Upload" /></td></tr>
		</table></fieldset></form></center>';
}
if($_SESSION['check']){
	print '<center><form action="" method="POST">
		<br><input type="submit" name="upload" value="Upload new video" style="width: 230px;"/>
		</form></center>';
}
	$connect = mysql_connect ("localhost","root","") or die(mysql_error());
	mysql_query("set names cp1251");
	mysql_query("set character_set_server=cp1251");
	mysql_select_db("tutorial") or die(mysql_error());
function Uploading($files){
	for($i = 0; $i < count($files['name']); $i++){
		move_uploaded_file($files['tmp_name'][$i], 'unloaded_videos/'.$files['name'][$i]); 
		$t = $_POST["title"];
		$f = $files['name'][$i];
		$query="INSERT INTO `videos` VALUES(NULL,'".$f."','".$t."',NULL)";
		mysql_query( $query ) or die(mysql_error());
	}	
}
if(isset($_POST['send-request']))
	Uploading($_FILES['load']);	
$result = mysql_query("SELECT * FROM videos ORDER By id DESC") or die(mysql_error());
$data = mysql_fetch_array($result);
if($data!=0){
	do{
		printf('
			<div class="video">
				<h1>%s</h1>
				<video height="400" width="600" controls="controls" poster="">
					<source src="unloaded_videos/%s">
				</video>
			</div><br/><p>%s</p>
			',$data["title"],$data["name"],$data["date"]);
	}
	while($data = mysql_fetch_array($result));
}
?>