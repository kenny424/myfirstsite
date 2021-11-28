<?php

include_once('connect_db.php');
try
{
	$query="SELECT surname,name,patronymic,age,gender,address,phone FROM employee";
	$result=$pdo->query($query);
}
catch (PDOException $e)
{
	echo "Ошибка выполнения запроса:".$e->getMessage();
	include 'error,html.php';
	exit();
}
while ($row=$result->fetch()) 
{
	$emp[]=array('surname'=>$row['surname'],'name'=>$row['name'],'patronymic'=>$row['patronymic'],'age'=>$row['age'],'gender'=>$row['gender'],'address'=>$row['address'],'phone'=>$row['phone'],);
}
include 'employee.html.php';
?>