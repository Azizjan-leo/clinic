<?php
	if(isset($_POST['Emp_ID'])){
		print "<br>Please, introduce the system or <a href='../../index.php?content=logIn'>LogIn</a><br><br>
			<form method='post' id='UnregVisitorFormId' onsubmit='return UnregVisitorFormHendling();'>
				
				*First name: <input type='text' pattern='[A-Z]{1,1}[a-z]{0,24}' name='f_name' class='Name' autofocus required /><br>
				Middile name: <input type='text' name='m_name' class='Name' /><br>
				*Second name: <input type='text' pattern='[A-Z]{1,1}[a-z]{0,24}' name='s_name' class='Name' required /><br>
				<input type='hidden'  name='Emp_ID' class='Name' value='$_POST[Emp_ID]' />
				*Phone:<br><font color='grey'>+996</font><input type='tel' pattern='.{9,9}' name='phone' class='Phone' placeholder='without spaces' required /><br><br>
				<input type='submit' value='Enter'>
			</form>";
	}
?>