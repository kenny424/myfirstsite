<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<style type="text/css">
</style>
<body>

	<form method="POST">
	<table>
	<tr>
	<td align="left">Фамилия</td>
	<td align="left"><input type="text" name="f"></td>
	</tr>
	<tr>
	<td align="left">Имя</td>
	<td align="left"><input type="text" name="i"></td>
	</tr>
<tr>
	<td align="left">Отчество</td>
	<td align="left"><input type="text" name="ot"></td>
	</tr>
<tr>
	<td align="left">Возраст</td>
	<td align="left"><input type="text" name="v"></td>
	</tr>
<tr>
	<td align="left">Область</td>
	<td align="left"><input type="text" name="o"></td>
	</tr>
<tr>
	<td align="left">Город</td>
	<td align="left"><input type="text" name="g"></td>
	</tr>
<tr>
	<td align="left">Улица</td>
	<td align="left"><input type="text" name="y"></td>
	</tr>
<tr>
	<td align="left">Дом</td>
	<td align="left"><input type="text" name="d"></td>
	</tr>
<tr>
	<td align="left">Квартира</td>
	<td align="left"><input type="text" name="k"></td>
	</tr>
<tr>
	<td align="left">Школа</td>
	<td align="left"><input type="text" name="sc"></td>
	</tr>
<tr>
	<td align="left">Институт</td>
	<td align="left"><input type="text" name="in"></td>
</tr>
	<td align="left"><input type="submit" value="ok" ></td>

	</table>
	</form>

<?php
$fam=$_POST["f"];
$name=$_POST["i"];
$sname=$_POST["ot"];
$age=$_POST["v"];
$obl=$_POST["o"];
$city=$_POST["g"];
$street=$_POST["y"];
$home=$_POST["d"];
$kvar=$_POST["k"];
$school=$_POST["sc"];
$inst=$_POST["in"];
try 
{
	$pdo=new PDO('mysql:host=localhost:3307;dbname=dadaya','root','');
	
} catch (PDOException $e) {
	die('Подключение не удалось'.$e->getMessage());
}
$sql="INSERT INTO registr (SurName,Name,Patronymic,Age,Region,City,Street,Home,Apartment,School,Institute) values('$fam','$name','$sname','$age','$obl','$city','$street','$home','$kvar','$school','$inst')";
$cat=$pdo->query($sql);
if(!empty($fam) && !empty($name) && !empty($sname) && !empty($age) && !empty($obl) && !empty($city) && !empty($street) && !empty($home) && !empty($kvar) && !empty($school) && !empty($inst)) {
echo "Заполните пустые поля";
}

?>
</body>
</html>