<?php
session_start();
$_SESSION['view'] = "grid";
header('Location: ../home/home.php');
?>