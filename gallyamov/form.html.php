<?php
include_once ('helpers.inc.php'); 
session_start();
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
            <title><?php htmlout($pageTitle); ?></title>
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
 <h1><?php htmlout($pageTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="POST">
    <table border="1">
        <tr><td>
    <div>
        <label for="fam">Фамилия:</td><td> <input type="text" name="fam" id="fam" value="<?php htmlout($fam);?>"></label>
   </td></tr></div><tr><td>
    <div>
        <label for="disp">Дисциплина:</td><td> <input type="text" name="disp" id="disp" value="<?php htmlout($disp);?>"></label>
    </div></tr><td>
    <div>
        <label for="ots">Оценка: </td><td><input type="text" name="ots" id="ots" value="<?php htmlout($ots);?>"></label>
    </div></tr>
         </table>
    <div>
        <input type="hidden" name="id" value="<?php htmlout($id);?>">
        <input type="submit" value="<?php htmlout($button);?>">
    </div>
   
</form>
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
