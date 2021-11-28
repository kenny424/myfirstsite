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
	<td align="left">Login</td>
	<td align="left"><input type="text" name="f"></td>
	</tr>
	<tr>
	<td align="left">Pass</td>
	<td align="left"><input type="password" name="i"></td>
	</tr>
	<td align="left"><input type="submit" value="Вход" ></td>

	</table>
	</form>

<?php
$login=$_POST["f"];
$password=$_POST["i"];
try 
{
	$pdo=new PDO('mysql:host=localhost:3307;dbname=dadaya','root','');
	
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
	}
	else
	{
		echo ("Неправильный логин или пароль");
	}

?>
</body>
</html>