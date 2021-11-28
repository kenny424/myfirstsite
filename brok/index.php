<?php
session_start();
if(isset($_GET['logout']))
{
    unset($_SESSION['logg']);
    unset($_SESSION['pass']);
    echo '<script>location.replace("/");</script>;';
    exit();
}
    if (isset($_GET['add']))
    {
        $action='addform';
        $Name_Add='';
        $Description='';
        $price='';
        $id='';
        $button='Добавить товар';
        include 'form.html.php';
        exit();
    }
    if (isset($_GET['addform']))
    {
        include '../database/connect_db.php';
        try
        {
            $sql='INSERT INTO Additional SET
              Name_Add = :Name_Add,
              Description = :Description,
              price = :price';
            $s=$pdo->prepare($sql);
            $s->bindValue(':Name_Add', $_POST['Name_Add']);
            $s->bindValue(':Description', $_POST['Description']);
            $s->bindValue(':price', $_POST['price']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            $error='Ошибка при добавлении автора.';
            include '../helpfiles/error.html.php';
            exit();
        }
        header('Location: .');
        exit();
    }

if (isset($_POST['action']) and $_POST['action']=='Редактировать')
{
    include '../database/connect_db.php';
    try
    {
        $sql='SELECT id, categories,price FROM amenities WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при извлечении информации о товаре.';
        include '../helpfiles/error.html.php';
        exit();
    }
    $row=$s->fetch();
    $action='editform';
    $categories=$row['categories'];
    $price=$row['price'];
    $id=$row['id'];
    $button='Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform']))
{
	include '../database/connect_db.php';
    try
    {
        $sql='UPDATE amenities SET
categories=:categories,
price=:price
WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':categories', $_POST['categories']);
        $s->bindValue(':price', $_POST['price']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи о товаре.';
        include '../helpfiles/error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}
if (isset($_POST['action']) and $_POST['action']=='Удалить')
{
    include '../database/connect_db.php';
    try
    {
        $sql='DELETE FROM amenities WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при удалении товара.';
        include '../helpfiles/error.html.php';
        exit();
    }
    header('Location:.');
    exit();
}

include '../database/connect_db.php';
try
    {
        $sqltable="SELECT table_name FROM information_schema.tables where table_schema='сompсlub'";
        $tablresl=$pdo->query($sqltable);;
        $countt=0;
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include '../helpfiles/error.html.php';
        exit();
    }
    while ($row = $tablresl->fetch()) 
    {
    $tabls[]=array(    
            'table_name' => $row['table_name'],
            'countt'=>$countt++
        );
    }
include '../brok/private.php';