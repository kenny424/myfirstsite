<?php
session_start();
include '../helpfiles/session.php';
include '../database/connect_db.php';
if(isset($_GET['logout']))
{
    unset($_SESSION['logg']);
    unset($_SESSION['pass']);
    echo '<script>location.replace("/");</script>;';
    exit();
}
if (isset($_POST['dataforbooking']))
{
    include'../database/connect_db.php';
    try
    {
        $sqli= $pdo->query('SELECT id FROM customer WHERE logg = "'.$_SESSION['logg'].'"');
        while ($row = $sqli->fetch())
        {
        $poe = $row['id'];
        }
        $sql='INSERT INTO booking SET
              dataforbooking = :dataforbooking,
              duration_on = :duration_on,
              duration_before = :duration_before,
              id_place=:id_place,
              id_cust=:id_cust,
              status=:status';
            $s=$pdo->prepare($sql);
            $s->bindValue(':dataforbooking', $_POST['dataforbooking']);
            $s->bindValue(':duration_on', $_POST['duration_on']);
            $s->bindValue(':duration_before', $_POST['duration_before']);
            $s->bindValue(':id_place', $_POST['place']);
            $s->bindValue(':id_cust', $poe);
            $s->bindValue(':status', 1);
            $s->execute();
    }
    catch(PDOException $e)
    {
        $error='Ошибка при бронирование';
        include'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

// if (isset($_POST['config']) and $_POST['action']=='1')
// {
//         include'../database/connect_db.php';
//         try
//         {
//         $sql1='select categories,proc,dimm,monitor from pc INNER JOIN amenities on pc.id=amenities.id_pc INNER JOIN place on amenities.id=place.id_amen INNER JOIN booking on place.id=booking.id_place INNER JOIN customer on customer.id=booking.id_cust WHERE logg="'.$logg.'"';
//         $result1 = $pdo->query($sql1);
//         }
//         catch(PDOException $e)
//         {
//         $error='Ошибка при извлечении данных';
//         include'error.html.php';
//         exit();
//         }
//         while ($row = $result1->fetch())
//         {
//         $confi[]=array(
//             'categories' =>$row['categories'],
//             'proc' =>$row['proc'],
//             'dimm' =>$row['dimm'],
//             'monitor' =>$row['monitor']
//         );
//         }
//         include 'bron.php';
// }
include '../database/connect_db.php';
try
    {
        $sql = "select * from place where id not in (select id_place from booking)";
        $rsl=$pdo->query($sql);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include 'helpfiles/error.html.php';
        exit();
    }
    while ($row = $rsl->fetch())
    {

        $place[]=array(
            'id' => $row['id']
        );
    }
include 'bron.php';