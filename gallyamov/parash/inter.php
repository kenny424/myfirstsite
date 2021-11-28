<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<style type="text/css">
.dad
{
	width: 410px;
	height: 300px;
	border: 1px solid black;
}
.dadd{
	width: 110px;
	height: 300px;

	border-right: 1px solid black;
}
.dada{
	position: absolute;
	left: 120px;
	top: 10px;
}
.ya
{
	position: absolute;
	left :16px;
	top: 70px;
}
.dae{
	position: absolute;
	left: 200px;
	top:180px;
}
</style>
<body>
	<form  method="POST">
		<div class="dad">
<div class="dadd">
<div class="ya">
<input type="submit" name="n" value="Новости">
<?php

if($_POST && isset($_POST['n'])){
{
try
{
	$pdo=new PDO ('mysql:host=localhost:3307;dbname=dadaya','root','');
}
catch(PDOException $e)
{
	die('Подключение не удалось'.$e->getMessage());
}
$sql="SELECT*FROM tb_novosti";
$cat=$pdo->query($sql);
echo "<table border=1>";
while ($row=$cat->fetch()) 
{ 
echo "<tr><td>";
echo $row['novosti'];
echo "</td>";
}
echo "</table>";
}
}

?>
</div>
<div class="dada">
</form>

<form  method="POST">
<input type="submit" name="friend"value="Друзья" >
<?php
if($_POST && isset($_POST['friend'])){
try
{
	$pdo=new PDO ('mysql:host=localhost:3307;dbname=dadaya','root','');
}
catch(PDOException $e)
{
	die('Подключение не удалось'.$e->getMessage());
}
$sql="SELECT*FROM registr";
$cat=$pdo->query($sql);
echo "<table border=1>";
while ($row=$cat->fetch()) 
{ 
echo "<tr><td>";
echo $row['SurName'];
echo "</td>";

echo "<td>";
echo $row['Name'];
echo "</td>";

echo "<td>";
echo $row['Patronymic'];
echo "</td></tr>";
}
echo "</table>";
}
?>
<div class="dae">
<img src="57_9.png" width="100" height="100">
</div>
</div>
	</div>
	</form>

</div>
</div>


</body>
</html>