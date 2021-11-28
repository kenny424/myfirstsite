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
            echo '<li class="da"><a href="brok/">'.$logg.'</a></li>';
            echo '<li class="da1"><a href="?logout"><img src="../icon/opened-door-aperture.svg" width="24" height="24"></a></li>';
            }
            ?>
    </ul>
</div>
<main class="main" id="main"> 
  <section class="menu" id="price">
    <div class="content">
      <h1 class="page-title">История бронирования</h1>
     <form action="?<?php echo htmlout($action);?>" method="POST">
      <h2 class="page-da">Весь список бронирования</h2>
  <table border="1">
            <tr>
                <th bgcolor="#1f1f1f">Дата бронирования</th>
                <th bgcolor="#1f1f1f">Номер места</th>
                <th bgcolor="#1f1f1f">Категория</th>
                <th bgcolor="#1f1f1f">Редактирование</th>
            </tr>
            <?php foreach($histbook as $hist): ?>
              <tr>
                  <td><?php echo htmlout($hist['dataforbooking']); ?></td>
                  <td><?php echo htmlout($hist['id_place']);?></td>
                  <td><?php echo htmlout($hist['categories']);?></td>
                  <td>
                    <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($hist['id']); ?>">
                                          <input type="submit" name="action" value="<?php htmlout($button);?>">
                                      </div>
                                  </form>
                              </td> 
        </tr>
         <tr>
              <th colspan="5" bgcolor="#8F8F8F">Конфигурация</th>
          </tr>
    <?php endforeach; ?>
            <tr>
                <th bgcolor="#1f1f1f">Процессор</th>
                <th bgcolor="#1f1f1f">Оперативная память</th>
                <th bgcolor="#1f1f1f">Монитор</th>
                <th bgcolor="#1f1f1f">Видеокарта</th>
            </tr>
            <?php foreach($conf as $bk): ?>
              <tr>
                  <td><?php echo htmlout($bk['proc']);?></td>
                  <td><?php echo htmlout($bk['dimm']);?></td>
                  <td><?php echo htmlout($bk['monitor']);?></td>
                  <td><?php echo htmlout($bk['graphics']);?></td>           
        </tr>
    <?php endforeach; ?>
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