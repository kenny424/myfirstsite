<?php
session_start();
include 'helpfiles/session.php';
 ?>
<?php include_once("database/connect_db.php"); ?>
<?php include_once ('helpfiles/helpers.inc.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/style(register).css">
	<link rel="shortcut icon" href="images/dead.ico" type="image/x-icon">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<title>Авторизация</title>
</head>
<body>
<script type="text/javascript" src="js/url.js"></script>
<div class="preheader">
		<div class="content">
			<div class="place" id="hours"><span class="openmap"><script language="JavaScript" type="text/javascript" src="js/date.js"></script></span></div>
		</div>
	</div>
<div class="navbar">
	<a class="logo" href="/"></a>
		<ul>
  			<li><a href="..">Главная</a></li>
  			<li><a href="#">Прайс</a></li>
  			<li><a href="#conf">Конфигурации</a></li>
  			<li><a href="bron/">Бронирование</a></li>
  			<li><a href="#">Контакты</a></li>
            <li><a href="?add">Регистрация</a></li>
  			<li class="da"><a href="#">Авторизация</a></li>
		</ul>
</div>
<main class="main" id="main">	
  <section class="menu" id="price">
  <div class="priceblock_f">
    <div class="content">
      <h1 class="page-title">Авторизация</h1>
       <form action="?<?php htmlout($action);?>" method="POST">
    <table border="1">
      <tr><td>
      <label for="logg">Логин:</td><td><input type="text" name="logg" id="logg" value="<?php htmlout($logg); ?>"></label></td>
      </tr><tr>
      <td>
      <label for="pass">Пароль:</td><td><input type="password" name="pass" id="pass" value="<?php htmlout($pass); ?>"></label></td>
          </tr>
    </table>
        <input type="submit" value="Авторизация">
    </form>
    </div>
  </div>
</section>
</main>
<footer id="footer">
	<p class="kaka">power by <a href="https://vk.com/nekro_424" target="_blank">424</a><p>

			</div>
</footer>
</body>
</html>