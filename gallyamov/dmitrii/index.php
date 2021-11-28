<?php
    if (isset($_GET['add']))
    {
        $pageTitle='Новый товар';
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
        include("connect_db.php");
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
            include 'error.html.php';
            exit();
        }
        header('Location: .');
        exit();
    }

if (isset($_POST['action']) and $_POST['action']=='Редактировать')
{
    include 'connect_db.php';
    try
    {
        $sql='SELECT id, Name_Add, Description,price FROM Additional WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при извлечении информации о товаре.';
        include 'error.html.php';
        exit();
    }
    $row=$s->fetch();
    $pageTitle='Редактировать товар';
    $action='editform';
    $Name_Add=$row['Name_Add'];
    $Description=$row['Description'];
    $price=$row['price'];
    $id=$row['id'];
    $button='Обновить информацию о товаре';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform']))
{
    include 'connect_db.php';
    try
    {
        $sql='UPDATE Additional SET
Name_Add=:Name_Add,
Description=:Description,
price=:price
WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':Name_Add', $_POST['Name_Add']);
        $s->bindValue(':Description', $_POST['Description']);
        $s->bindValue(':price', $_POST['price']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи о товаре.';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}
if (isset($_POST['action']) and $_POST['action']=='Удалить')
{
    include 'connect_db.php';
    try
    {
        $sql='DELETE FROM Additional WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error='Ошибка при удалении товара.';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

    include("connect_db.php");
    try
    {
        $query = "SELECT id,Name_Add, Description, price FROM Additional";
        $result = $pdo->query($query);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    while ($row = $result->fetch())
    {
        $prod[]=array(
            'id' => $row['id'],
            'Name_Add' =>$row['Name_Add'],
            'Description' =>$row['Description'],
            'price' =>$row['price']
        );
    }
    include 'product.html.php';
