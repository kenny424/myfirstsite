<?php
	try
	{
		$pdo=new PDO('mysql:host=localhost; port=3305; dbname=dmitrii','root','');
		$pdo->exec('SET NAMES "UTF-8"');
	}
	catch(PDOException $e)
	{
		echo "gg";
		include 'error.html.php';
		exit();
	}
