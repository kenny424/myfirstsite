<?php
include $_SERVER['DOCUMENT_ROOT'] . '../kyrs/includes/connect_db.php';

$ses = $_SESSION['id'];
session_start();

try {
    $query = "SELECT 
                contract.id,
                client.surname as csurname,
                client.name as cname,
                client.patronymic as cpatronymic,
                employees.surname as esurname,
                employees.name as ename,
                employees.patronymic as epatronymic,
                appeal,
                amount_paid,
                actual_amount,
                client.birth as cbirth,
                client.city as ccity,
                client.phone as cphone 
              FROM employees inner join ( client inner join contract on client.id=contract.client) on employees.id=contract.employees
              ";
    $result = $pdo->query($query);

} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
    include '../../includes/error.php';
    exit();
}


while ($row = $result->fetch()) {
    $contracts[] = array(
        'id' => $row['id'],
        'csurname' => $row['csurname'],
        'cname' => $row['cname'],
        'cpatronymic' => $row['cpatronymic'],
        'esurname' => $row['esurname'],
        'ename' => $row['ename'],
        'epatronymic' => $row['epatronymic'],
        'appeal' => $row['appeal'],
        'amount_paid' => $row['amount_paid'],
        'actual_amount' => $row['actual_amount'],
        'cbirth'=>$row['cbirth'],
        'ccity'=>$row['ccity'],
        'cphone'=>$row['cphone']);
}

include "othetic.html.php";