<?php
session_start();
if(!isset($_SESSION['login']) && isset($_COOKIE['login'])&&(!isset($_SESSION['password']) && isset($_COOKIE['password'])))

    $_SESSION['login'] = $_COOKIE['login'];
   $_SESSION['password'] = $_COOKIE['password'];

  $login=$_SESSION['login'];
   $password=$_SESSION['password'];
  if($login==null && $password==null)
  {
    header("Location: autentif.php");
    exit;
  }
  ?>