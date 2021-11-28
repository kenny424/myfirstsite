<?php
session_start();
include 'session.php';
include 'connect_db.php';
?>
<html>
<head>
  <meta charset="utf-8">
<style>
  @keyframes go-left-right {  
    from {
      left: 0px;  
    }
    to {
      left: calc(12% - 50px); 
    }
  }
  .progress {
    animation: go-left-right 3s infinite alternate;
    position: relative;
  }
</style>
<script type="text/javascript" src="lol.js">
    </script> 
<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
  function JSClock(){
    var time=new Date()
    var hour=time.getHours()
    var minute=time.getMinutes()  
    var second=time.getSeconds()
    var temp=""+hour
    temp+=((minute<10)?":0":":")+minute
    temp+=((second<10)?":0":":")+second
    document.clockForm.digits.value=temp
    id=setTimeout("JSClock()",1000)
  }
  id=setTimeout("JSClock()",1000)
</SCRIPT>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows 1251" />
            <title>Дисциплины</title>
<link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="Scripts.js"></script>
</head>
<body bgcolor="#FFCC00" onLoad="JSClock()">
<div id="container">
  <div id="header">
  <div class="progress"><h2 class="e"><a href="index.php">Пр-16-2</a></h2></div>
  <h2 class="d"><a href="grupp.php">О группе</a></h2>
     <?php 
  if($login =='admin')
    { 
      echo '<h2 class="y"><a href="mmain(admin).php">Успеваемость</a></h2>';
    }
    else
    {
      echo '<h2 class="y"><a href="mmain.php">Успеваемость</a></h2>';
    }
    ?>
 <button class="i"><a href="autentif.php">Выход</a></button>
  <h2>Дисциплины:</h2>
  <?php

   $sql = "SELECT * FROM disp";
   $result = $pdo->query($sql); 
   echo "<table border=1 width=600 height=200>";
   echo "<td align=center>Фамилия</td>
  <td align=center>Дисциплина</td>
  <td align=center>Аудитория</td>";
   while ($row = $result->fetch())
   {
       $pole1=$row[1];
       $pole2=$row[2];
       $pole3=$row[3];
       echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td></tr>";
   }
   echo "</table>";
   ?>
  </div>
  <div id="content">
  <h2 class="es"><a href="classruk.php">Классный руководитель</a></h2>
   <?php 
  if($login =='admin')
    { 
      echo '<h2 class="es1"><a href="dis(admin).php">Дисциплина</a></h2>';
    }
    else
    {
      echo '<h2 class="es1"><a href="dis.php">Дисциплина</a></h2>';
    }
    ?>
  <h2 class="es2"><a href="photo.php">Фотогалерея</a></h2>
        
<form name="form">
<h1>Оцените наш сайт</h1>
<input type="text" name="name">
 <input type="button" onClick="validate(this.value)" value="Проверить">
  </form>
  
<canvas class="lolkek" id="smile" width="200" height="200">
<p>Ваш браузер.</p>
  </div>
     
  <div id="clear">
     
  </div>
                 
  <div id="footer">
    <footer >Разработчик:Галлямов Мирас</footer>
    <BODY bgcolor="#FFCC00" onLoad="JSClock()">
      <FORM NAME="clockForm" class="bochok">
        <INPUT TYPE="text" NAME="digits" SIZE=4 VALUE="">
      </FORM>
    </BODY>
  </div>
</div> 

</body>
</html>
