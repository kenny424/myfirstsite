<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вывод данных из бд</title>
</head>
<?php include_once('helpers.inc.php')?>
<body>
<h1>Сотрудники</h1>
<p><a href="?add"> Добавить нового сотрудника</a></p>
<table>
	<tr>
		<td>Фамиллия</td>
		<td>Имя</td>
		<td>Отчество</td>
		<td>Возраст</td>
		<td>Пол</td>
		<td>Адрес</td>
		<td>Телефон</td>
	</tr>
	<?php foreach ($emp as $pdo): ?>	
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
					<input type="hidden" name="id" value="<?php htmlout($pdo['id']);?>">
					<input type="submit" name="action" value="Редактирование">
					<input type="submit" name="action" value="Удалить">
				</div>
			</form>
			</td>
	</tr>
	<?php endforeach;?>
</table>
</body>
</html>



