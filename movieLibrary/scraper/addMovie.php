<?php
session_start();



echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="../views/views.css">';
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
echo '	</head>';
include '../navigation/navigation.html';
echo '		<div id="names">';
echo '			<form action="addMovie.php" method="post">';
echo '				<table>';
echo '					<tr>';
echo '						<td><label>Movie Name: </label></td>';
echo '						<td><input type="text" name="title" /></td>';
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
echo '				<input type="submit" value="Add Movie" name="add" />';

echo '			</form>';
if (!empty($_SESSION['movies']))
{
	echo '			<h1>Movies to scrape: </h1>';
	
	foreach ($_SESSION['movies'] as $movie) {
		echo '<label>'.$movie.'</label><br/>';
	}
}
if (!empty($_POST['add'])) 
{
	include '../sanitize.php';

	$_SESSION['movie']['Title'] = StringInputCleaner($_POST['title']);
	$_SESSION['movieFile'] = StringInputCleaner($_POST['file']);
	$_SESSION['movie']['Poster'] = StringInputCleaner($_POST['poster']);
	$_SESSION['movie']['Plot'] = StringInputCleaner($_POST['plot']);
	$_SESSION['movie']['Rated'] = StringInputCleaner($_POST['rating']);

	include 'insertMovie.php';
}
echo '		</div>';
?>