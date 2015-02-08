<?php 
session_start(); 
$_SESSION['movie_id'];
$_SESSION['movieURL'];
$_SESSION['view'] = "list";
$_SESSION['user_name']; 
$_SESSION['user_password'];
$_SESSION['login_attempts'] = 0;
$_SESSION['logged_in'] = False;
header('Location: home/home.php');
?>