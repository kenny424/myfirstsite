<?php
session_start();
include 'helpfiles/session.php';
include 'database/connect_db.php';
// function Login($logg,$pass)
// {
//     if($logg=='')
//     {
//         return false;
//     }
//     if($pass=='')
//     {
//         return false;
//     }
//     $_SESSION['logg']=$logg;
//     $_SESSION['pass']=$pass;
//     if($save==true)
//     {
//         setcookie('logg',$logg,time()+3600);
//         setcookie('pass',$pass,time()+3600);
//     }
//     return true;
// }
// function logout()
// {
//     setcookie('logg','',time()-1);
//     setcookie('pass','',time()-1);
//     unset($_SESSION['logg']);
//     unset($_SESSION['pass']);
// }
// $site=false;
// logout();
if(isset($_GET['logout']))
{
    unset($_SESSION['logg']);
    unset($_SESSION['pass']);
    unset($_SESSION['root']);
    echo '<script>location.replace("/");</script>;';
    exit();
}
if (isset($_GET['auth'])) {
    $action='authentif';
    include 'auth.php';
    exit();
}
if (isset($_GET['authentif'])) {
    include 'database/connect_db.php';
    try {
        $sqli="SELECT id,logg,pass,root FROM customer";
        $cat=$pdo->query($sqli);
        $logg=$_POST['logg'];
        $pass=$_POST['pass'];
        while ($row=$cat->fetch()) 
        {
            if(($_POST['logg']==$row['logg']) && (password_verify($pass,$row['pass'])))
            {
                $_SESSION['root']=$row['root'];
                $_SESSION['logg']=$logg;
                $_SESSION['pass']=$pass;
                $yes=1;
            }
            if($save=='on')
            {
                $save=true;
            }
        }
            if($yes==1)
            {
                echo '<script>location.replace("/");</script>;';
            }
            if($yes!=1)
            {
                echo '<script>alert("Неправильный логин или пароль");</script>';
                echo '<script>location.replace("?auth");</script>;';
            }
    }
    catch (PDOException $e) 
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include 'helpfiles/error.html.php';
        exit();
    }
}
//
if(isset($_GET['add']))
{

    $action='addform';
    include'register.php';
    exit();
}
if (isset($_GET['addform']))
{
	include 'database/connect_db.php';
	try {
    $sql='insert into customer set 
        surname=:surname,
        nname=:nname,
        patronymic=:patronymic,
        pass=:pass,
        logg=:logg,
        phone=:phone,
        email=:email;';
        $s = $pdo->prepare($sql);
        $s->bindValue(':surname',$_POST['surname']);
        $s->bindValue(':nname',$_POST['nname']);
        $s->bindValue(':patronymic',$_POST['patronymic']);
        $s->bindValue(':pass',password_hash(($_POST['pass']),PASSWORD_DEFAULT));
        $s->bindValue(':logg',$_POST['logg']);
        $s->bindValue(':phone',$_POST['phone']);
        $s->bindValue(':email',$_POST['email']);
        $s->execute();
        header('Location: .');
} 
catch (PDOException $e) {
    $error='Ошибка при добавлении сотрудника';
    include'helpfiles/error.html.php';
    exit();
}
}
include 'database/connect_db.php';
try
    {
        $query = "SELECT id,proc, dimm, keyboard, monitor, graphics, mouse, headphones FROM pc";
        $sql = "SELECT id, categories, price FROM amenities";
        $rsl=$pdo->query($sql);
        $result = $pdo->query($query);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include 'helpfiles/error.html.php';
        exit();
    }
    while ($row = $rsl->fetch())
    {
        $price[]=array(
            'id' => $row['id'],
            'categories' =>$row['categories'],
            'price' =>$row['price']
        );
    }
    while ($row = $result->fetch())
    {
        $conf[]=array(
            'id' => $row['id'],
            'proc' =>$row['proc'],
            'dimm' =>$row['dimm'],
            'monitor' =>$row['monitor'],
            'graphics' =>$row['graphics'],
            'keyboard' =>$row['keyboard'],
            'mouse' =>$row['mouse'],
            'headphones' =>$row['headphones']
        );
    }
include 'home.php';