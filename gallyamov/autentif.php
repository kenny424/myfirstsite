<?php
session_start();
include 'connect_db.php';
function Login($login,$password,$save)
{
	if($login=='')
	{
		return false;
	}
	if($password=='')
	{
		return false;
	}
	$_SESSION['login']=$login;
	$_SESSION['password']=$password;
	if($save==true)
	{
		setcookie('login',$login,time()+3600);
		setcookie('password',$password,time()+3600);
	}
	return true;
}
function logout()
{
	setcookie('login','',time()-1);
	setcookie('password','',time()-1);
	unset($_SESSION['login']);
	unset($_SESSION['password']);
}

$site=false;
logout();
$login=$_POST['login']; 
$password=$_POST['password']; 
$sql="SELECT*FROM logpass";
$cat=$pdo->query($sql);
while ($row=$cat->fetch()) 
{
  if($row['login']==$login && $row['pass']==$password)
  {
    $site=Login($_POST['login'],$_POST['password'],$_POST['save']=='on');
  }

   if($save=='on')
  {
  	$save=true;
  }
  }
  if($site==true)
  {
  	echo '<script>location.replace("index.php");</script>'; 
  	exit;
  }


?>
<html>
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<style type="text/css">
	.poe
	{
		position: absolute;
		left:42%;
		top:20%;

		font-size: 23px;
	}
	.pin{
		font-size: 20px;
		position: absolute;
		top: 29%;
		left: 42%;
	}
</style>
<body>
<table border=1 align="center" class="poe">
	<form method="POST">
<tr><td align="right">Логин</td><td>
<input type="text" name="login">
</td></tr><tr><td align="right">Пароль</td><td>
<input type="password" name="password">
<tr><td align="right">
		<input type="submit" value="Вход" >
</td><td>
		<input type="submit" value="Регистрация">	
</td>
</tr>
	<p class="pin" align="center">Запомнить меня<input type="checkbox" name="save"></p>	
</table>
	</form>
</body>
</html>
