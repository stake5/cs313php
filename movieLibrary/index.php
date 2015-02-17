<?php 
session_start(); 
$_SESSION['movies'] = array();
$_SESSION['mainURL'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['movie_id'];
$_SESSION['movieURL'];
$_SESSION['view'] = "list";
$_SESSION['user_name']; 
$_SESSION['user_password'];
$_SESSION['login_attempts'] = 0;
$_SESSION['logged_in'] = False;
header('Location: home/home.php');
?>