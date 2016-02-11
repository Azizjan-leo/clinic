<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php
if(isset($_POST["send"])){
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$text = $_POST["text"];
	
	mail('litpulla@mail.ru', 'You heve message from you blog site',"\n Sender name: ". $name."\n Text: ".$text."\n Sender email: ".$email."\n Sender phone: ".$phone);

}	
?>
<center><br><br><form  method="post" action="">
	<table>
		<tr><td>NAME: </tr></td><tr><td><input type="text" name="name" placeholder="Name" required /><b>*</b></td></tr>
		<tr><td>PHONE:</tr></td><tr><td><input type="text" name="phone" placeholder="Phone" /></td></tr>
		<tr><td>EMAIL: </tr></td><tr><td><input type="text" name="email" placeholder="Email" required /><b>*</b></td></tr>
		<tr><td>MESSAGE: </tr></td><tr><td><textarea name="text" placeholder="Message text" cols="60" rows="6" required /></textarea></td></tr>
		<tr><td><input type="submit" name="send" value="SEND"></td></tr>
	</table>
</form></center>
</body>
</html>
