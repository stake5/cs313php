<?php
session_start();

$submitted = FALSE;
$updated = FALSE;

if (!empty($_POST['edit'])) 
{
	$_SESSION['movie']['oldTitle'] = $_POST['title'];
	$_SESSION['movie']['Title'] = $_POST['newTitle'];
	$_SESSION['movieFile'] = $_POST['file'];
	$_SESSION['movie']['Poster'] = $_POST['poster'];
	$_SESSION['movie']['Plot'] = $_POST['plot'];
	$_SESSION['movie']['Rated'] = $_POST['rating'];

	include 'updateMovie.php';
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="../views/views.css">';
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
echo '	</head>';
include '../navigation/navigation.html';
echo '		<div id="names">';
echo '			<form action="editMovie.php" method="post">';
echo '				<table>';
echo '					<tr>';
echo '						<td><label>Movie Name: </label></td>';
echo '						<td><input type="text" name="title" /></td>';
echo '					</tr>';
echo '				</table>';

echo '				<p>Only change the remaining fields to edit their corresponding field in your database!</p>';
echo '				<table>';
echo '					<tr>';
echo '						<td><label>New Movie Name: </label></td>';
echo '						<td><input type="text" name="newTitle" /></td>';

echo '					</tr>';
echo '					<tr>';
echo '						<td><label>Movie File Name: </label></td>';
echo '						<td><input type="text" name="file" /></td>';
echo '					</tr>';
echo '					<tr>';
echo '						<td><label>Movie Poster Link: </label></td>';
echo '						<td><input type="text" name="poster" /></td>';
echo '					</tr>';
echo '					<tr>';
echo '						<td><label>Movie Rating: </label></td>';
echo '						<td><input type="text" name="rating" /></td>';
echo '					</tr>';
echo '				</table>';
echo '				<label>Movie Plot: </label><br/>';
echo '				<textarea name="plot" ></textarea>';
echo '				<input type="submit" value="Edit Movie" name="edit" />';

if ($submitted) 
{
	if ($updated) 
	{
		echo '<br/><label>'.$_SESSION['movie']['oldTitle'].' was successfully changed!</label>';
	}
	else
	{
		echo '<br/><label>Your update was not successfull!</label>';
	}
}

echo '		</div>';
?>