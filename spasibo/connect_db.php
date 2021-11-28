<?php
try
{
	$pdo = new PDO('mysql:host=localhost:3307;dbname=gallyamov', 'root', '');
	$pdo->exec('set names utf8');
}
catch (PDOException $e)
{
	echo"Подключение к бд не удалось";
	include 'error.html.php';
	exit();
}
?>