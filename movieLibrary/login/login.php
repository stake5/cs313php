<?php
session_start();


echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<title>Airtime Login</title>';
echo '		<link rel="stylesheet" type="text/css" href="login.css">';
echo '	</head>';
echo '	<body>';
echo '		<div id="loginBox">';
echo '			<div id="loginTitle">';
echo '				<h1>Airtime Login</h1>';
echo '			</div>';
echo '			<form name="login" method="post" action="../home/home.php">';
echo '				<table>';
echo '					<tr>';
echo '						<td>';
echo '							<label>Username: </label>';
echo '						</td>';
echo '						<td>';
echo '							<input type="text" name="user_name"><br/>';
echo '						</td>';
echo '					</tr>';
echo '					<tr>';
echo '						<td>';
echo '							<label>Password: </label>';
echo '						</td>';
echo '						<td>';
echo '							<input type="password" name="user_password"><br/>';
echo '						</td>';
echo '					</tr>';
echo '					<tr>';
echo '						<td><input type="submit" value="Login"></td>';
if ($_SESSION['login_attempts'] > 1) 
{
	echo '<td><p>Login Failed!</p></td>';
}
echo '					</tr>';
echo '				</table>';
echo '			</form>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>

