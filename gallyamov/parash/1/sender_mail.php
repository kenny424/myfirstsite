<?php
//Подключаемся к БД
$connect = mysqli_connect('hostname', 'login', 'pass', 'BDname', ) or die ('Нет подключения к базе данных');

//Записываем данные пришедшие из формы в переменные
$subject = $_POST['subject'];
$body_text = $_POST['body_text'];

//Записываем запрос к БД в переменную
$query = "SELECT * FROM store_list";

// Выполняем отправку запроса в БД и выводим результат функции
$result = mysqli_query($connect, $query) or die ('Что то пошло не так...');

while ($row = mysqli_fetch_array($result)) {
mail ($row[email], $subject, $body_text);
echo 'Письмо успешно отправлено подписчику: ' . $row[first_name] . ' ' . $row[last_name] . '  на адрес: ' . $row[email] . '<br />'; 
};

// Закрываем соединение с БД
mysqli_close($connect);

?>