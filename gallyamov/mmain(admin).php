<?php
include_once ('helpers.inc.php'); 
session_start();
include 'session.php';
include 'connect_db.php';
  if (isset($_POST['action']) and $_POST['action']=='Редактировать')
{
    include 'connect_db.php';
    try
    {
        $sql='SELECT id, fam,disp,ots FROM numb WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при извлечении информации о товаре.';
        include 'error.html.php';
        exit();
    }
    $row=$s->fetch();
    $pageTitle='Изменение данных';
    $action='editform';
    $fam=$row['fam'];
    $disp=$row['disp'];
    $ots=$row['ots'];
    $id=$row['id'];
    $button='Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform']))
{
    include 'connect_db.php';
    try
    {
        $sql='UPDATE numb SET
fam=:fam,
disp=:disp,
ots=:ots
WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':fam', $_POST['fam']);
        $s->bindValue(':disp', $_POST['disp']);
        $s->bindValue(':ots', $_POST['ots']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи о товаре.';
        include 'error.html.php';
        exit();
    }
    header('Location:mmain(admin).php');
    exit();
}
if (isset($_POST['action']) and $_POST['action']=='Удалить')
{
    include 'connect_db.php';
    try
    {
        $sql='DELETE FROM numb WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при удалении товара.';
        include 'error.html.php';
        exit();
    }
    header('Location:mmain(admin).php');
    exit();
}

    include("connect_db.php");
    try
    {
        $query = "SELECT id,fam,disp,ots FROM numb";
        $result = $pdo->query($query);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    while ($row = $result->fetch())
    {
        $prod[]=array(
            'id' => $row['id'],
            'fam' =>$row['fam'],
            'disp' =>$row['disp'],
            'ots' =>$row['ots']
        );
    }
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
            <title>Успеваемость</title>
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
  <h2>Наша успеваемость:</h2>
  <table border="1">
    <tr>
        <th>Фамилия</th>
        <th>Дисциплина</th>
        <th>Оценка</th>
        <th>Панель</th>
    </tr>
    <?php foreach($prod as $pro): ?>
        <tr>
            <td><?php echo htmlout($pro['fam']); ?></td>
            <td><?php echo htmlout($pro['disp']);?></td>
            <td><?php echo htmlout($pro['ots']); ?></td>
            <td>
                <form action="?" method="POST">
                    <div>
                        <input type="hidden" name="id" value="<?php htmlout($pro['id']); ?>">
                        <input type="submit" name="action" value="Редактировать">
                        <input type="submit" name="action" value="Удалить">
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
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
