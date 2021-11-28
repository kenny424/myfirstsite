<?php 
session_start();
include('helpfiles/session.php'); ?>
<?php include_once('database/connect_db.php'); ?>
<?php include_once ('helpfiles/helpers.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="images/dead.ico" type="image/x-icon">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>booking</title>
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
  			<li><a href="#main">Главная</a></li>
  			<li><a href="#poed">Прайс</a></li>
  			<li><a href="#conf">Конфигурации</a></li>
  			<li><a href="bron/">Бронирование</a></li>
  			<li><a href="#">Контакты</a></li>
            <?php
            if ($logg==NULL)
            {
            echo '<li><a href="?add">Регистрация</a></li>';
  			echo '<li class="da"><a href="?auth">Авторизация</a></li>';
            }
            else
            {
            if($logg=="admin")
            {
            echo '<li class="da"><a href="brok/">'.$logg.'</a></li>';
            }
            else
            {
            echo '<li class="da"><a href="pers/">'.$logg.'</a></li>';
            }
            echo '<li class="da1"><a href="?logout"><img src="icon/opened-door-aperture.svg" width="24" height="24"></a></li>';
            }
            ?>
		</ul>
</div>
<main class="main" id="main">
 		<video loop muted autoplay poster="images/back.jpg" class="fullscreen-bg__video">
 			<source src="video/32.mp4" type="video/mp4">
 		</video>
<button class="btn">
    <a href="bron/">
  Забронировать
    </a>
</button>
</main>
 <div class="brands" id=poed>
	<div class="content">
		<div><img  src="images/brand/steelseries-logo-D6CEC2BD58-seeklogo.com.png" alt="aoc"></div>
		<div><img  src="images/brand/logitech340.png" alt="log"></div>
		<div><img src="images/brand/sennheiser.svg" alt="Sennheiser"></div>
		<div><img  src="images/brand/AMD-logo-2847522454-seeklogo.com.png" alt="corsair"></div>
	</div>
</div>
<section class="menu" id="price">
	<div class="priceblock_f">
		<div class="content">
			<h1 class="page-title">Прайс-лист</h1>
				<table class="price_t" border="1">
    				<tr>
       					<th>Название конфигурации</th>
        				<th>Цена</th>
   					</tr>
    				<?php foreach($price as $pri): ?>
        			<tr>
            			<td><?php echo htmlout($pri['categories']); ?></td>
            			<td><?php echo htmlout($pri['price']);?></td>
            		<!--  <td>
            				<form action="?" method="POST">	
            			                    <div>
            			                        <input type="hidden" name="id" value="<?php htmlout($pro['id']); ?>">
            			                        <input type="submit" name="action" value="Редактировать">
            			                        <input type="submit" name="action" value="Удалить">
            			                    </div>
            			                </form>
            			            </td>  -->
        </tr>
    <?php endforeach; ?>
</table>
		</div>
	</div>
</section>
<div class="stat">
	<div class="content">
		<div><img src="icon/computer.png" alt="Иконка"><i>27</i>Компьютеров</div>
		<div><img src="icon/processor.png" alt="Иконка"><i>3</i>Конфигурации</div>
		<div><img src="icon/gaming-chair.png" alt="Иконка"><i>3</i>Зала</div>
	</div>
</div>
<section class="menu" id="conf">
	<div class="confblock_f">
		<div class="content">
			<h1 class="page-title">Конфигурация</h1>	
				<table border="1">
    				<tr>
       					<th>Процессор</th>
        				<!--<th>Оперативная память</th>-->
        				<th width="250">Монитор</th>
        				<!--<th>Мышка</th>-->
        				<th>Клавиатура</th>
        				<th>Видеокарта</th>
        			<!--	<th>Наушники</th>-->
   					</tr>
    				<?php foreach($conf as $pro): ?>
        			<tr>
            			<td><?php echo htmlout($pro['proc']); ?></td>
            			<!--<td><?php /*echo htmlout($pro['dimm']);*/?></td>-->
            			<td><?php echo htmlout($pro['monitor']); ?></td>
            			<!--<td><?php /*echo htmlout($pro['mouse']); */?></td>-->
            			<td><?php echo htmlout($pro['keyboard']); ?></td>
            			<td><?php echo htmlout($pro['graphics']); ?></td>
            			<!--<td><?php /*echo htmlout($pro['headphones']); */?></td>-->
            			<!-- <td>
            				<form action="?" method="POST">
            			                    <div>
            			                        <input type="hidden" name="id" value="<?php htmlout($pro['id']); ?>">
            			                        <input type="submit" name="action" value="Редактировать">
            			                        <input type="submit" name="action" value="Удалить">
            			                    </div>
            			                </form>
            			            </td> -->
        </tr>
    <?php endforeach; ?>
</table>
			</div>
		</div>
	</div>
</section>
<footer id="footer">
	<p class="kaka">power by <a class="kak4ka" href="https://vk.com/nekro_424" target="_blank">424</a><p>
</footer>
</body>
</html>