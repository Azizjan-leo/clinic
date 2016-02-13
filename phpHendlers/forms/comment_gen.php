<?php
 include("../connect.php");
 $text_comment = $_POST["text_comment"];
 $comment_date = date("y.m.d");
 $text_comment = htmlspecialchars($text_comment);
 mysql_query("INSERT INTO `Comments_general` (`Comment_ID`, `Date`, `Text`) VALUES ('', '".$comment_date."', '".$text_comment."')");
 header("Location: ".$_SERVER["HTTP_REFERER"]);
 ?>