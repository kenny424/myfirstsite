<?php
try
{
	$pdo = new PDO('mysql:host=localhost:3306;dbname=сompсlub', 'root', '');
	$pdo->exec('set names utf8');
}
catch (PDOException $e)
{
	echo"Подключение к бд не удалось";
	include 'helpfiles/error.html.php';
	exit();
}
?>