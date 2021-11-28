<?php
session_start();
$login=$_POST['login'];
$pass=$_POST['pass'];
$_SESSION['login']=$login;
$_SESSION['pass']=$pass;
setcookie("login",$login,time()+3600);
setcookie("pass",$pass,time()+3600);
?>
<html>
<head>
	<title>Form</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST">
		Логин:<input type="text" name="login"><br>
		Пароль:<input type="password" name="pass"><br>
		<input type="submit" value="Вход" name="hhh">
		<?php
		session_start();
		try
		{
			$pdo=new PDO('mysql:host=localhost:3307:dbname:loggpass','root','');
		}
		catch(PDOException $e)
		{
			die('Подключение к бд не удалось'.$e->getMessage());
		}
		$sql="SELECT * FROM loggpass";
		$cat=$pdo->query($sql);
while ($row=$cat->fetch()) 
{
	if($row['login']==$login && $row['pass']==$pass)
	{
		$c=1;	
	}
}
if($c=1)
{
	header('location: auth.php');
}
else
{
	echo "Неправильно введены данные";
}
		?>
	</form> 
</body>
</html>
