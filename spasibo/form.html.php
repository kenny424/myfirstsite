<?php include_once('helpers.inc.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php htmlout($pageTitle);?></title>
</head>
<body>
	<h1><?php htmlout($pageTitle);?></h1>
	<form action="<?php htmlout($action);?>" method="POST">
		<table border="1">

			<tr><td>
			<label for="surname">Фамилия:</td><td><input type="text" name="surname" id="surname" value="<?php htmlout($surname); ?>"></label></td>
			</tr><tr>
			<td>
			<label for="name">Имя:</td><td><input type="text" name="sname" id="name" value="<?php htmlout($name); ?>"></label></td>
	  	    </tr><tr>
	    	<td>
			<label for="patronymic">Отчество:</td><td><input type="text" name="patronymic" id="patronymic" value="<?php htmlout($patronymic); ?>"></label></td>
			</tr><tr>
	    	<td>
			<label for="age">Возраст:</td><td><input type="text" name="age" id="age" value="<?php htmlout($age); ?>"></label></td>
			</tr><tr>
	    	<td>
			<label for="gender">Пол:</td><td><input type="text" name="gender" id="gender" value="<?php htmlout($gender); ?>"></label></td>
			</tr><tr>
	    	<td>
			<label for="address">Адрес:</td><td><input type="text" name="address" id="address" value="<?php htmlout($address); ?>"></label>	</td>
			</tr><tr>
	    	<td>
			<label for="phone">Телефон:</td><td><input type="text" name="phone" id="phone" value="<?php htmlout($phone); ?>"></label></td>
		</table>
		<input type="submit" value="Добавить">
	</form>
</body>
</html>