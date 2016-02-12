<?
	print "
     <div class='doc_info'>
     <div class='doc_photo'><img src='../images/noavatar.png'></div>
     <div class='state'><a href='#' class='button blue' onClick='hiddenShow(\"b1\");' id='button1'>Запись на прием</a>     <a href='#' class='button blue' onClick='scripts/hiddenShow(\"b2\");' id='button2'>Посмотреть список</a></div>
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
    <div id='b1' class='hidden'>
    <br>ЗАПИСЬ К ВРАЧУ<br><br>
    <form name='statement' method='post'>
     You visit the clinic: <br>
     <input type='radio' name='visit' id='visit1' onClick='choose();' /> First time <br>
     <input type='radio' name='visit' id='visit2' onClick='choose();' /> You have been here <br>
     <input type='text' name='card_number' id='card_number' maxlength='10' placeholder='Card number' size='30' required /><br>
     <input type='text' name='first_name' id='first_name' maxlength='30' placeholder='First name' size='30' required /><br>
     <input type='text' name='middle_name' id='middle_name' maxlength='30' placeholder='Middle name' size='30' required /><br>
     <input type='text' name='second_name' id='second_name' maxlength='30' placeholder='Second name' size='30' required /><br>
     <input type='text' name='phone_number' maxlength='30' placeholder='Phone number' size='30' required /><br>
     <select>
     <option value='' disabled selected style='display:none;'>Choose doctor</option>
      <option>doctor</option>
     </select>
     <input type='date' name='date' required /><br>
     <input type='submit' name='doc_state' value='Enter'>
    </form>
    </div>
    <div id='b2' class='hidden'><br>СПИСОК ЗАПИСАВШИХСЯ<br><br></div>
 ";
?>