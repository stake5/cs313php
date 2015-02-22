<?php
session_start();

if ($_POST) 
{
	include 'insertUser.php';
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<title>Airtime Login</title>';
echo '		<link rel="stylesheet" type="text/css" href="registration.css">';
echo '	</head>';
echo '	<body>';
echo '		<div id="loginBox">';
echo '			<div id="loginTitle">';
echo '				<h1>Airtime Registration</h1>';
echo '			</div>';
echo '			<form name="login" method="post" action="registration.php">';
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
echo '						<td><input type="submit" value="Register"></td>';
echo '					</tr>';
echo '					<tr>';
echo '						<td><a id="loginLink" href="login.php">Login</a></td>';
echo '					</tr>';
echo '				</table>';
echo '			</form>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>

