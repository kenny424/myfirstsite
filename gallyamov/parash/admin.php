<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'dadaya')
    or die('Error connecting to MySQL server.');

  $id = $_POST['id'];
  $query = "DELETE FROM disp WHERE id = '$id'";
  mysqli_query($db, $query)
    or die('Error querying database.');

  mysqli_close($db);
include_once'dis(admin).php';
?>
<head>
	<meta charset="utf-8">
</head>
