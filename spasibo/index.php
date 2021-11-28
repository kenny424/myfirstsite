<?php
if(isset($_GET['add']))
{
	$pagetitle='Новый сотрудник';
	$action='addform';
	$surname='';
	$name='';
	$patronymic='';
	$age=''
	$gender='';
	$address='';
	$phone='';
	$button='Добавить сотрудника';
	include'form.html.php';
	exit();
}
if(isset($_GET['addform']))
{
	include'connect_db.php';
	try
	{
		$sql='insert into employee set 
		surname=:surname,
		name=:name,
		patronymic=:patronymic,
		age=:age,
		gender=:gender,
		address=:address,
		phone=:phone;';
		$s = $pdo->prepare($sql);
		$s->bindValue(':surname',$_POST['surname']);
		$s->bindValue(':name',$_POST['name']);
		$s->bindValue(':patronymic',$_POST['patronymic']);
		$s->bindValue(':age',$_POST['age']);
		$s->bindValue(':gender',$_POST['gender']);
		$s->bindValue(':address',$_POST['address']);
		$s->bindValue(':phone',$_POST['phone']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error='Ошибка при добавлении сотрудника';
		include'error.html.php';
		exit();
	}
}
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