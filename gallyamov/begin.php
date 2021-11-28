<?php
session_start();
?>
<!Doctype html>
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
            <title>Вход</title>
<link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="Scripts.js"></script>
</head>
<body bgcolor="#FFCC00" onLoad="JSClock()">
<div id="container">
  <div id="header">
  <div class="progress"><h2 class="e"><a href="index.html">Пр-16-2</a></h2></div>
  <h2 class="d"><a href="index.html">На главную</a></h2>
  <h2 class="y"><a href="mmain.html">Успеваемость</a></h2>
  <button class="p"><a href="register.php">Регистрация</a></button>
  <button class="i">Вход</button>
  <form method="POST"> 
  <table border="1">
<tr><td align="right">
login
</td><td>
<input type="text" name="login" >
</td></tr>
<tr><td align="right">
password
</td><td>
<input type="password" name="password">
</table>
<input type="submit" value="Вход">
<input type="reset" value="Сброс данных">
</form>
<?php
$login=$_POST['login'];
$password=$_POST['password'];
try 
{
  $pdo=new PDO('mysql:host=localhost:3306;dbname=dadaya','root','');
  
} catch (PDOException $e) {
  die('Подключение не удалось'.$e->getMessage());
}
$sql="SELECT*FROM logpass";
$cat=$pdo->query($sql);
while ($row=$cat->fetch()) 
{
  if($row['login']==$login && $row['pass']==$password)
  {
    $c=1;
  }
}
  if($c==1)
  {
   echo("Вы авторизованы");
   echo '<script>location.replace("index.html");</script>'; exit;
  }
  else
  {
    echo ("Неправильный логин или пароль");
  }
?>
  </div>
  <div id="content">
  <h2 class="es"><a href="">Классный руководитель</a></h2>
  <h2 class="es1"><a href="dis.html">Дисциплины</a></h2>
  <h2 class="es2"><a href="photo.html">Фотогалерея</a></h2>
        
</convas> <form name="form">
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
