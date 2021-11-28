<?php
try
{
	$pdo=new PDO ('mysql:host=localhost:3307;dbname=dadaya','root','');
}
catch(PDOException $e)
{
	die('Подключение не удалось'.$e->getMessage());
}
$sql = mysqli_query($link, 'SELECT * FROM `tb_novosti`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "{$result['novosti']}";
  }
?>