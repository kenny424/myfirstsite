<?php
//Подключаемся к БД
$connect = mysqli_connect('hostname', 'login', 'pass', 'BDname', ) or die ('Нет подключения к базе данных');

//Записываем данные пришедшие из формы в переменные
$dell_email = $_POST['dell_email'];

if (($dell_email == '')) {
	echo "Вы не указали E-mail подписчика, которго нужно удалить";
	} else {
		//Записываем запрос к БД в переменную
		$query = "DELETE FROM store_list WHERE email='$dell_email'";

		// Выполняем отправку запроса в БД
		mysqli_query($connect, $query) or die ('Не удалось записать данные в БД');

		// Закрываем соединение с БД
		mysqli_close($connect);

		echo "E-mail $dell_email успешно удален из базы данных.";
};

?>