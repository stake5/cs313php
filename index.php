<?php 
session_start(); 
$_SESSION['voted'] = 0; 
header('Location: home.php');
?>