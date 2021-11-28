<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вывод данных из бд</title>
</head>
<body>
<h1>Сотрудники</h1>
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
	<?php foreach ($jobb as $pdo): ?>
	<tr>
		<td>
			<?php echo htmlspecialchars($pdo['name_job'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['charge'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['requirements'],ENT_QUOTES,'utf-8');?>
		</td>
	</tr>
	<?php endforeach;?>
</table>
</body>
</html>