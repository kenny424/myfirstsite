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
     <div>
            <?php foreach ($pit as $pt) : ?>
            <form method="POST" action="?export">
                <div><span>Клиент - </span>
                    <?php echo htmlout($pt['surname']); ?>
                        <input type="hidden" name="surname" value="<?php echo htmlout($pt['surname']); ?>">
                    <?php echo htmlout($pt['name']); ?>
                        <input type="hidden" name="name" value="<?php echo htmlout($pt['name']); ?>">
                    <?php echo htmlout($pt['patronymic']); ?>
                        <input type="hidden" name="patronymic" value="<?php echo htmlout($pt['patronymic']); ?>">
                </div>
                
                <div><span>Дата обращения - </span>
                    <?php echo htmlout($pt['dataforbooking']); ?>
                        <input type="hidden" name="dataforbooking" value="<?php echo htmlout($pt['dataforbooking']); ?>">
                </div>
                <div><span>Сумма оплаченная - </span>
                    <?php echo htmlout($pt['price']); ?>
                        <input type="hidden" name="price" value="<?php echo htmlout($pt['price']); ?>">
                </div>
                <div><span>Номер места - </span>
                    <?php echo htmlout($pt['id_place']); ?>
                        <input type="hidden" name="id_place" value="<?php echo htmlout($pt['id_place']); ?>">
                </div>
                <div>
                    <input type="hidden" name="email" value="<?php echo htmlout($pt['email']); ?>">
                </div>
                <div>
                    <input type="hidden" name="phone" value="<?php echo htmlout($pt['phone']); ?>">
                </div>
                <input type="hidden" name="id" value="<?php htmlout($pt['id']); ?>">
                <input type="submit" name="sub_oplata_pdf" id="sub_pecat" value="Вывести договор">
            </form><br>
            <?php endforeach; ?>
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