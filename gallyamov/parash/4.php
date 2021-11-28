<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<body>
	<form method="POST">	
	Введите первое число:
	<input type="text" name="a"><br>
	Введите второе число:
	<input type="text" name="b"><br>
	Введите третье число:
	<input type="text" name="c"><br>
	<input type="submit" value="ok">
	</form>
<?php
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
if($a>0 and $b>0)
{
	echo "Число a=$a и число b=$b положительные";
}
elseif ($b>0 and $c>0) 
{
	echo "Число b=$b и число c=$c положительные";
}
elseif ($a>0 and $c>0) 
{
	echo "Число a=$a и число c=$c положительные";
}
else
{
	echo "Нету положительных чисел";
}
?>
</body>
</html>