<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<body>
	<form method="POST">	
	Введите сторону a:
	<input type="text" name="a"><br>
	Введите сторону b:
	<input type="text" name="b"><br>
	Введите сторону c:
	<input type="text" name="c"><br>
	<input type="submit" value="ok">
	</form>
<?php
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
if($a==$b && $b==$c && $a==$c)
	echo "Треугольник равносторонний";
else 
	echo "Треугольник не равносторонний";
?>
</body>
</html>