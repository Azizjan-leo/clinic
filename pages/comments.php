<?php
	echo "
 <div class='comments'> Отзывы:<br><br>
 <div id='comments_form'><form name='comment' action='../phpHendlers/forms/comment_gen.php' method='post'>
 <p><label>Комментарий:</label><br />
 <textarea name='text_comment' cols='50' rows='5' maxlength='500' required></textarea></p>
 <p><input type='submit' value='Отправить' /></p>
 </form></div>
 <p><a href='#' class='button blue' onClick='comment_button();'>Write comment</a><p>
 ";
 $res = mysql_query('SELECT * FROM `Comments_general` ORDER BY Date DESC') or die("Can't connect to database. ".mysql_error());
 while ($row = mysql_fetch_array($res)) {
 echo "<div class='comment_block'><div class='comment_date'>".$row['Date']."</div>
 <div class='comment_text'><p>".$row['Text']."</p></div></div>";
 }
 echo "</div>";
?>