<?php
session_start();
$_SESSION['view'] = "list";
echo $_SESSION['user_name']."<br/>";
echo $_SESSION['user_password']."<br/>";

header('Location: ../home/home.php');
?>