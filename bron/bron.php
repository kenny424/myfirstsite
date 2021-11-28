<?php session_start();
include '../helpfiles/session.php'; ?>
<?php include_once("../database/connect_db.php"); ?>
<?php include_once ('../helpfiles/helpers.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/style(register).css">
	<link rel="shortcut icon" href="../images/dead.ico" type="image/x-icon">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<title>Бронирование</title>
</head>
<body>
<script type="text/javascript" src="../js/url.js"></script>
<script type="text/javascript">
	$(function(){     
  var d = new Date(),        
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});
	function getValue() 
	{
	var durations=document.getElementById('duration').value;
	var curdate=new Date();
	curdate.setHours(curdate.getHours()+Number(durations));
	newdate=curdate.getHours()+':'+curdate.getMinutes()
    document.getElementById('timevihod').value =newdate;
	}
</script>
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
  			<li><a href="#">Бронирование</a></li>
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
                echo '<li class="da"><a href="../brok/">'.$logg.'</a></li>';
              }
              else
              {
                  echo '<li class="da"><a href="../pers/">'.$logg.'</a></li>';
              }
            echo '<li class="da1"><a href="?logout"><img src="../icon/opened-door-aperture.svg" width="24" height="24"></a></li>';
            }
            ?>
		</ul>
</div>
<main class="main" id="main">	
  <section class="menu" id="price">
  <div class="priceblock_f">
    <div class="content">
      <h1 class="page-title">Бронирование</h1>
      <table border="1">
        <tr>
                <th>Дата посещения</th>
                <th>Свободные места</th>
        </tr>
         <tr>
       <form action="?" method="POST">
  		<td><input class="circu" type="date" name="dataforbooking"></td>
      <td>
    <select name="place">
    <?php foreach ($place as $plc): ?>
      <option name="config" value="<?php htmlout($plc['id']); ?>"><?php echo ' Место'.htmlout($plc['id']);?></option>
    <?php endforeach;?>
    </select>
    <input type="submit" name="actions" value="Конфигурация">
    </td>
	</tr>
        <tr>
            <th>Начало сеанса</th>
             <th>Продолжительность</th>
          </tr>
       </tr>
    <td>
    <input class="circu" type="time"  value="now" size="3" maxlength="5" name="duration_on" id="timevhod" onclick="getValue()" >
    <input class="circu" type="time" readonly maxlength="5" size="3" name="duration_before" id="timevihod">
    </td>
    <td>
    	<select name="duration" id="duration">
    		<option value="1" selected>1 часов</option>
    		<option value="2">2 часов</option>
    		<option value="3">3 часов</option>
    		<option value="4">4 часов</option>
    		<option value="5">5 часов</option>
    		<option value="6">6 часов</option>
    		<option value="7">7 часов</option>
    		<option value="8">8 часов</option>
    		<option value="9">9 часов</option>
    		<option value="10">10 часов</option>
    		<option value="11">11 часов</option>
    		<option value="12">12 часов</option>
    		<option value="13">13 часов</option>
    		<option value="14">14 часов</option>
    		<option value="15">15 часов</option>
    		<option value="16">16 часов</option>
    		<option value="17">17 часов</option>
    		<option value="18">18 часов</option>
    		<option value="19">19 часов</option>
    		<option value="20">20 часов</option>
    		<option value="21">21 часов</option>
    		<option value="22">22 часов</option>
    		<option value="23">23 часов</option>
    		<option value="24">24 часов</option>
    	</select>
    </td>
 </tr> 
 <td>
 <input type="submit" name="action" value="Бронировать">
</td>
 </form>
     </table>
    </div>
  </div>
</section>
</main>
<footer id="footer">
	<p class="kaka">power by <a href="https://vk.com/nekro_424" target="_blank">424</a><p>
</footer>
</body>
</html>