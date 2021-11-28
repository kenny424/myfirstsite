<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<body>
	<form method="POST">	
	Введите средний балл:
	<input type="text" name="s"><br>
	<input type="submit" value="ok">
	</form>
<?php
$s=$_POST["s"];
if($s>3.6)
	echo "У вас премия 1000р";
else 
	echo "У вас нет премии";
?>
</body>
</html>