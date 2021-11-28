<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<body>
	<form method="POST">	
	Введите стаж работы:
	<input type="text" name="a"><br>
	<input type="submit" value="ok">
	</form>
<?php
$a=$_POST["a"];
if($a<3)
{
echo "Ваша премия состовляет 2000р";
}
elseif($a>=3 and $a<5)
{
	echo "Ваша премия состовляет 3000р";
}
elseif ($a>=5) 
{
	echo "Ваша премия состовляет 5000р";
}
?>
</body>
</html>