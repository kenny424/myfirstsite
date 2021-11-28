<tr>
		<td>
			<?php echo htmlspecialchars($pdo['surname'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['name'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['patronymic'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['age'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['gender'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['address'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['phone'],ENT_QUOTES,'utf-8');?>
		</td>
	</tr>




	<tr>
			<td>
				<?php htmlout($pdo['surname']);?>
			</td>
			<td>
				<?php htmlout($pdo['name']);?>
			</td>
			<td>
				<?php htmlout($pdo['patronymic']);?>
			</td>
			<td>
				<?php htmlout($pdo['age']);?>
			</td>
			<td>
				<?php htmlout($pdo['gender']);?>
			</td>
			<td>
				<?php htmlout($pdo['address']);?>
			</td>
			<td>
				<?php htmlout($pdo['phone']);?>
			</td>
			<td>
			<form action="" method="POST">
				<div>
					<input type="hidden" name="id" value="<?php htmlout($pdo[id]);?>">
					<input type="submit" name="action" value="редактирование">
					<input type="submit" name="action" value="удалить">
				</div>
			</form>
			</td>
	</tr>



	if(isset($_GET['add']))
{
	$pagetitle='Новый сотрудник';
	$action='addform';
	$surname='';
	$name='';
	$patronymic='';
	$age='';
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
	header('location:.');
	exit();
}