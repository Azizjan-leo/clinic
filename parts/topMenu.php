<?
	printf ('<nav id="menu-wrap">
      <ul id="menu">
       <li><a href="../index.php?content=%s">Doctors</a></li>
       <li><a href="#">Меню</a>
       <ul>
         <li><a href="../index.php?content=%s">Comments</a></li>
         <li><a href="#">Подменю</a></li>
         <li><a href="#">Подменю</a></li>
         <li><a href="#">Подменю</a></li>
        </ul>
       </li>
       <li><a href="../index.php?content=%s">Expert system</a></li>
       <li><a href="../phpHendlers/connect.php?action=%s">Out</a></li>
      </ul>
      </nav>',doctors,comments,syst,out);
?>