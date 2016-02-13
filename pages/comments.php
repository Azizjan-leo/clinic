<?php
	echo "
 <div class='comments'> Отзывы:<br><br>
 <form name='comment' action='../phpHendlers/forms/comment_gen.php' method='post'>
 <p>
 <label>Комментарий:</label>
 <br />
 <textarea name='text_comment' cols='50' rows='5'></textarea>
 </p>
 <p>
 <input type='submit' value='Отправить' />
 </p>
 </form>";
 $res = mysql_query('SELECT * FROM `Comments_general` ORDER BY Date DESC') or die("Can't connect to database".mysql_error());
 while ($row = mysql_fetch_array($res)) {
 echo "<div class='comment_block'><div class='comment_date'>".$row['Date']."</div>
 <div class='comment_text'><p>".$row['Text']."</p></div></div>";
 }
 echo "</div>";
?>