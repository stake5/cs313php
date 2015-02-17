<?php
session_start();

if (!empty($_POST))
{

	if (!empty($_POST['add'])) 
	{
		if(!empty($_POST['title']))
		$_SESSION['movies'][] = $_POST['title'];
	}
	else if (!empty($_POST['clear']))
	{
		$_SESSION['movies'] = array();
	}
	else if (!empty($_POST['scrape']))
	{
		header('Location: scraper.php');
	}
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="../views/views.css">';
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
echo '	</head>';
include '../navigation/navigation.html';
echo '		<div id="names">';
echo '			<form action="newMovies.php" method="post">';
echo '				<label>Movie to Scrape: </label>';
echo '				<input type="text" name="title" />';
echo '				  <input type="submit" value="Add Movie" name="add" />';
echo '				  <input type="submit" value="Clear List" name="clear" />';
echo '				  <input type="submit" value="Scrape Movies" name="scrape" />';
echo '			</form>';
if (!empty($_SESSION['movies']))
{
	echo '			<h1>Movies to scrape: </h1>';
	
	foreach ($_SESSION['movies'] as $movie) {
		echo '<label>'.$movie.'</label><br/>';
	}
}
echo '		</div>';
?>