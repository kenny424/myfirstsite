<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
</head>
<body>
	<form method="POST">	
	Введите свои данные:<br>

	Фамилия:<input type="text" name="f" required ><br>
	Имя:<input type="text" name="n" required ><br>
	Отчество:<input type="text" name="o" required ><br>
	Возраст:<input type="number" name="v" required ><br>
	<input type="submit" value="ok">
	</form>
<?php
$f=$_POST["f"];
$n=$_POST["n"];
$o=$_POST["o"];
$v=$_POST["v"];
echo "<table border=1> <tr> <td>Фамилия</td> <td>Имя</td> <td>Отчество</td> <td>Возраст</td> </tr> 
			  <tr> <td>$f</td>      <td>$n</td>  <td>$o</td>       <td>$v</td>      </tr>
		</table>";
?>
</body>
</html>