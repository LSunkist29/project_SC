<?php 
session_start(); 
$_SESSION = array(); 
session_destroy(); 
$_COOKIE='';
$_SESSION['loggedin']='';
// echo $_SESSION['loggedin'];
// echo "ok";
header('location:../index.php'); 
?>
