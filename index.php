﻿<html>
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<link rel="stylesheet" type="text/css" href="styles/css.css" />
 </head>
 <body>
  <div class="all">
   <div id="top"><center>TOP</center></div>
   <div id="topmenu"></div>
   <div class="main">
    <div id="menu"><center>MENU</center></div>
    <div id="action">
     Добавление симптомов.
     <form name="symptoms">
      <input type="text" name="symptom_name" maxlength="30" placeholder="Название симптома" size="30" required /><br>
      <textarea name="symptom_description" maxlength="100" cols="50" rows="3" placeholder="Описание симптома" required></textarea><br>
      <input type="submit" value="Отправить">
     </form>
     Добавление должности.
     <form name="staff">
      <input type="text" name="staff_name" maxlength="30" placeholder="Название должности" size="30" required /><br>
      <input type="text" name="salary_name" maxlength="11" placeholder="Заработная плата" size="30" required /><br>
      <input type="submit" value="Отправить">
     </form>
     Сотрудники.
     <form name="emp">
      <input type="text" name="first_name" maxlength="30" placeholder="Имя" size="30" required /><br>
      <input type="text" name="middle_name" maxlength="30" placeholder="Фамилия" size="30" required /><br>
      <input type="text" name="second_name" maxlength="30" placeholder="Отчество" size="30" required /><br>
      <input type="date" name="date" required /><br>
      <select name="prof" required><option>пункты</option></select><br>
      <input type="text" name="phone_num" maxlength="10" placeholder="Номер телефона" size="30" required /><br>
      <textarea  name="pasport_data" maxlength="50" cols="50" rows="2" placeholder="Паспортные данные" required></textarea><br>
      <input type="submit" value="Отправить">
     </form>
     <!--Это пока не трогай, завтра поменяем-->
     <!--Диагнозы.
     <form name="dianoses">
      <input type="text" name="diagnos_name" maxlength="30" placeholder="Название диагноза" size="30" required /><br>
      <textarea name="dignos_description" maxlength="100" cols="50" rows="3" placeholder="Описание диагноза" required></textarea><br>
      <textarea name="symptoms" maxlength="200" cols="50" rows="6" placeholder="Симптомы" readonly required></textarea><br>
      <input type="submit" value="Отправить">
     </form>-->
    </div>
   </div>
   <div class="clean"></div>
  </div>
  <div id="footer"><center>FOOTER</center></div>
 </body>
</html>