<?php
//Подключаемся к БД
$connect = mysqli_connect('hostname', 'login', 'pass', 'BDname', ) or die ('Нет подключения к базе данных');

//Записываем данные пришедшие из формы в переменные
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

if (($firstname == '') && ($lastname == '') && ($email == '')) {
	echo "Нужно заполнить все поля!";
	} else {
		//Записываем запрос к БД в переменную
		$query = "INSERT INTO store_list VALUES ('$firstname', '$lastname', '$email')";

		// Выполняем отправку запроса в БД
		mysqli_query($connect, $query) or die ('Не удалось записать данные в БД');

		// Закрываем соединение с БД
		mysqli_close($connect);

		echo "Подписка успешно совершена. Ждите рассылку.";
};

?>