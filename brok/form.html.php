<?php session_start();
include '../helpfiles/session.php'; ?>
<?php 
if($logg==null && $root==0)
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
  <link rel="shortcut icon" href="images/dead.ico" type="image/x-icon">
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
        <li><a href="..">Главыная</a></li>
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
            echo '<li class="da"><a href="brok/">'.$logg.'</a></li>';
            echo '<li class="da1"><a href="?logout"><img src="../icon/opened-door-aperture.svg" width="24" height="24"></a></li>';
            }
            ?>
    </ul>
</div>
<main class="main" id="main"> 
  <section class="menu" id="price">
  <div class="priceblock_f">
    <div class="content">
      <?php
      echo '<h1 class="page-title">Редактирование</h1>';
      ?>
<form action="?<?php htmlout($action); ?>" method="POST">
  <table border="1">
    <tr>
                <th>Название конфигурации</th>
                <th>Цена</th>
            </tr>
            <tr>
        <td><input type="text" name="categories" id="categories" value="<?php htmlout($categories);?>"></td>
        <td><input type="text" name="price" id="price" value="<?php htmlout($price);?>"></td>
      </tr>
      <td>
        <input type="hidden" name="id" value="<?php htmlout($id);?>">
        <input type="submit" value="<?php htmlout($button);?>">
      </td>
    </table>
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