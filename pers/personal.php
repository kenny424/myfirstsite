<?php session_start();
include '../helpfiles/session.php'; ?>
<?php 
if(($logg==null))
{
  echo '<script>location.replace("/");</script>';
}
include_once("../database/connect_db.php"); ?>
<?php include_once ('../helpfiles/helpers.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="../css/style(register).css">
  <link rel="shortcut icon" href="../images/dead.ico" type="image/x-icon">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <title>Личный кабинет</title>
</head>
<body>
<script type="text/javascript" src="js/url.js"></script>
<div class="preheader">
    <div class="content">
      <div class="place" id="hours"><span class="openmap"><script language="JavaScript" type="text/javascript" src="../js/date.js"></script></span></div>
    </div>
  </div>
<div class="navbar">
  <a class="logo" href="/"></a>
    <ul>
        <li><a href="..">Главная</a></li>
        <li><a href="#">Прайс</a></li>
        <li><a href="#conf">Конфигурации</a></li>
        <li><a href="../bron/">Бронирование</a></li>
        <li><a href="#">Контакты</a></li>
        <?php
            if ($logg==NULL)
            {
            echo '<li><a href="?add">Регистрация</a></li>';
            echo '<li class="da"><a href="?auth">Авторизация</a></li>';
            }
            else
            {
            echo '<li class="da"><a href="../pers">'.$logg.'</a></li>';
            echo '<li class="da1"><a href="?logout"><img src="../icon/opened-door-aperture.svg" width="24" height="24"></a></li>';
            }
            ?>
    </ul>
</div>
<main class="main" id="main"> 
  <section class="menu" id="price">
    <div class="content">
      <?php
      echo '<h1 class="page-title">Здравствуй, '.$logg.'</h1>';
      ?>
      <h2 class="page-da">Моя учетная запись</h2>
      <form action="?" method="POST">
      <table>
        <tr><th><img src="../icon/avatar.png"></th><td><button class="pers-a" name="action" value="personal">Изменить личную информацию</button>
        </td></tr>
        <tr><th><img src="../icon/key.png"></th><td><button class="pers-a" name="action" value="password">Изменить пароль</button></td></tr>
        <tr><th><img src="../icon/email.png"></th><td><button class="pers-a" name="action" value="email">Изменить email</button></td></tr>
      </table>
      <h2 class="page-da">Моя учетная запись</h2>
      <table>
        <tr><th><img src="../icon/story.png"></th><td><button class="pers-a" name="action" value="historybrooking">История бронирования</button></td></tr>
        <tr><th><img src="../icon/voucher.png"></th><td><button class="pers-a" name="action" value="check">Выписать чек</button></td></tr>
      </table>
      </form>
    </div>
</section>
</main>
<footer id="footer">
  <p class="kaka">power by <a href="https://vk.com/nekro_424" target="_blank">424</a><p>

      </div>
</footer>
</body>
</html>