<?php
session_start();
if(!isset($_SESSION['logg']) && isset($_COOKIE['logg'])&&(!isset($_SESSION['pass']) && isset($_COOKIE['pass'])))

    $_SESSION['logg'] = $_COOKIE['logg'];
   $_SESSION['pass'] = $_COOKIE['pass'];
   
  $logg=$_SESSION['logg'];
   $pass=$_SESSION['pass'];
   $root=$_SESSION['root'];
  // if($logg==null && $pass==null)
  // {
  //   header("Location: autentif.php");
  //   exit;
  // }
  ?>