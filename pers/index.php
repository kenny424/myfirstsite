<?php
session_start();
include '../helpfiles/session.php';
if(isset($_GET['logout']))
{
    unset($_SESSION['logg']);
    unset($_SESSION['pass']);
    echo '<script>location.replace("/");</script>;';
    exit();
}
if (isset($_POST['action']) and $_POST['action']=='personal')
{
    include '../database/connect_db.php';
    try
    {
        $sql='SELECT id, surname, nname,patronymic,phone,email FROM customer WHERE logg="'.$logg.'"';
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
    $action='editpers';
    $surname=$row['surname'];
    $nname=$row['nname'];
    $patronymic=$row['patronymic'];
    $phone=$row['phone'];
    $email=$row['email'];
    $id=$row['id'];
    $button='Обновить информацию';
    include 'form.personal.php';
    exit();
}
if (isset($_GET['editpers']))
{
    include '../database/connect_db.php';
    try
    {
        $sql='UPDATE customer SET
        surname=:surname,
        nname=:nname,
        patronymic=:patronymic,
        phone=:phone,
        email=:email
        WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':nname', $_POST['nname']);
        $s->bindValue(':patronymic', $_POST['patronymic']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':email', $_POST['email']);
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

if (isset($_POST['action']) and $_POST['action']=='password')
{
    $button='Сменить пароль';
    $action='editpass';
    $value1='oldpass';
    $value2='newpass';
    $td1='Старый пароль';
    $td2='Новый пароль';
    $typebutton='password';
    include 'form.php';
    exit();
}
if (isset($_POST['action']) and $_POST['action']=='email')
{
    $button='Сменить email';
    $action='editemail';
    $value1='oldemail';
    $value2='newemail';
    $td1='Старый email';
    $td2='Новый email';
    $typebutton='text';
    include 'form.php';
    exit();
}
if (isset($_GET['editemail']))
{
    include '../database/connect_db.php';
    try
    {
        $sqli=$pdo->query('SELECT id,email FROM customer WHERE logg = "'.$logg.'"');
        while ($row = $sqli->fetch())
        {
        $email = $row['email'];
        $id=$row['id'];
        }
        if((($_POST['oldemail'])==$email))
        {
        $sql='UPDATE customer SET
        id=:id,
        email=:email
        WHERE logg="'.$_SESSION['logg'].'"';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':email',($_POST['newemail']));
        $s->execute();
        }
        else
        {
            echo '<script>alert("Не правильно введена старая почта");</script>';
        }
    }
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи.';
        include '../helpfiles/error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

if (isset($_GET['editpass']))
{
    include '../database/connect_db.php';
    try
    {
        $sqli=$pdo->query('SELECT id,pass FROM customer WHERE logg = "'.$logg.'"');
        while ($row = $sqli->fetch())
        {
        $passold = $row['pass'];
        $id=$row['id'];
        }
        if((password_verify($_POST['oldpass'],$passold)))
        {
        $sql='UPDATE customer SET
        id=:id,
        pass=:pass
        WHERE logg="'.$_SESSION['logg'].'"';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':pass', password_hash(($_POST['newpass']),PASSWORD_DEFAULT));
        $s->execute();
        }
        else
        {
            echo '<script>alert("Неправильный пароль");</script>';
        }
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

if (isset($_POST['action']) and $_POST['action']=='check')
{
    include '../database/connect_db.php';
    try
    {
    $button='Экспорт в pdf файл';
    $action='export';
    $sql='SELECT categories,price,dataforbooking,surname,nname,patronymic,phone,email,id_place FROM booking INNER JOIN customer on customer.id=booking.id_cust INNER JOIN place on place.id=booking.id_place INNER JOIN amenities on amenities.id=place.id_amen INNER JOIN pc on pc.id=amenities.id_pc where customer.logg="'.$logg.'"';
    $result = $pdo->query($sql);
    }
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи о товаре.';
        include '../helpfiles/error.html.php';
        exit();
    }
    while ($row = $result->fetch()) {
    $pit[] = array(
        'id' => $row['id'],
        'categories' => $row['categories'],
        'surname' => $row['surname'],
        'nname' => $row['nname'],
        'patronymic' => $row['patronymic'],
        'dataforbooking' => $row['dataforbooking'],
        'id_place' => $row['id_place'],
        'price' => $row['price'],
        'email' => $row['email'],
        'phone'=>$row['phone']);
}
    include 'form.export.php';
    exit();
}

if (isset($_GET['export']))
{
    $id=$_POST['id'];
    $categories=$_POST['categories'];
    $price=$_POST['price'];
    $dataforbooking=$_POST['dataforbooking'];
    $surname=$_POST['surname'];
    $nname=$_POST['nname'];
    $patronymic=$_POST['patronymic'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $id_place=$_POST['id_place'];
    define('FPDF_FONTPATH',"../fpdf/font/");
    require('../fpdf/fpdf.php');
    $pdf=new FPDF('P','mm','A4');

    // устанавливаем заголовок документа
    $pdf->SetTitle("Чек докогова",'windows-1251');
// создаем страницу
    $pdf->AddPage('P');
// добавляем шрифт ариал
    $pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
    $pdf->SetFont('Arial');
// устанавливаем цвет шрифта
    $pdf->SetTextColor(0,0,0);
// устанавливаем размер шрифта
    $pdf->SetFontSize(14);
// добавляем на страницу изображение

    $pdf->SetXY(70,10);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Чек"));

    $pdf->SetXY(30,20);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Дата бронирования мест"));
    $pdf->SetX(150);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$dataforbooking));
    $pdf->SetXY(148,20.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"___________"));

    $pdf->SetXY(35,40);
    $pdf->Write(0,iconv('utf-8', 'windows-1251','ООО "Cyber", именуемое в дальнейшем Компьютерный клуб, в лице'));
    $pdf->SetXY(25,50);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$surname)."  ".iconv('utf-8', 'windows-1251',$nname)."  ".iconv('utf-8', 'windows-1251',$patronymic));
    $pdf->SetXY(20,50.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_______________________________"));

    $pdf->SetXY(88,170);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма бронирования"));
    $pdf->SetXY(50,180);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма бронирования "));
    $pdf->SetXY(100,180);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$price)." p");

    $pdf->SetXY(20,90);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Электронный адрес клиента - "));
    $pdf->SetXY(82,90);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$email));
    $pdf->SetXY(79,90.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"______________________"));


    $pdf->SetXY(20,130);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Номер телефона клиента - "));
    $pdf->SetXY(85,130);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$phone));
    $pdf->SetXY(84,130.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"______________________"));
// выводим документа в браузере
    $pdf->Output('storage-contract.pdf','I');
}

if (isset($_POST['action']) and $_POST['action']=='historybrooking')
{
    $action='bron';
    $button='Отменить бронирование';
    include '../database/connect_db.php';
    try 
    {
         $sql1='SELECT booking.id,dataforbooking,id_place,categories FROM booking LEFT OUTER JOIN customer on booking.id_cust=customer.id inner join place on place.id=booking.id inner join amenities on amenities.id=place.id_amen WHERE customer.logg="'.$logg.'"';
         $result = $pdo->query($sql1);
         $sql='select categories,proc,dimm,monitor,graphics,keyboard,mouse from pc INNER JOIN amenities on pc.id=amenities.id_pc INNER JOIN place on amenities.id=place.id_amen INNER JOIN booking on place.id=booking.id_place INNER JOIN customer on customer.id=booking.id_cust WHERE logg="'.$logg.'"';
         $rsl=$pdo->query($sql);
    }  
    catch (PDOException $e)
    {
        $error='Ошибка при обновлении записи о товаре.';
        include '../helpfiles/error.html.php';
        exit();
    }
    while ($row = $rsl->fetch())
    {
        $conf[]=array(
            'id' => $row['id'],
            'categories' =>$row['categories'],
            'proc' =>$row['proc'],
            'dimm' =>$row['dimm'],
            'monitor' =>$row['monitor'],
            'graphics' =>$row['graphics'],
            'keyboard' =>$row['keyboard'],
            'mouse' =>$row['mouse'],
        );
    }
    while ($row = $result->fetch())
    {
        $histbook[]=array(
            'id' => $row['id'],
            'dataforbooking' =>$row['dataforbooking'],
            'id_place' =>$row['id_place'],
            'categories' =>$row['categories']
        );
    }
    include 'form.booking.php';
    exit();
}
if (isset($_GET['bron']))
{
    include '../database/connect_db.php';
    try
    {
        $sql='DELETE FROM booking WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
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

include '../database/connect_db.php';
try
    {
        $query = 'SELECT id,surname,nname,patronymic,phone,email FROM customer WHERE logg="'.$logg.'"';
        $result = $pdo->query($query);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include '../helpfiles/error.html.php';
        exit();
    }
    while ($row = $result->fetch())
    {
        $cust[]=array(
            'id' => $row['id'],
            'surname' =>$row['surname'],
            'nname' =>$row['nname'],
            'patronymic' =>$row['patronymic'],
            'phone' =>$row['phone'],
            'email' =>$row['email']
        );
    }
include '../pers/personal.php';