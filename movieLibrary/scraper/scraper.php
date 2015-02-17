<?php
session_start();
echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="../views/views.css">';
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
echo '	</head>';
include '../navigation/navigation.html';
echo '		<div>';
echo '			<table id="movieGrid">';



$movieList=$_SESSION['movies'];
$_SESSION['i'] = 0;
foreach($movieList as $key => $line)
{
	// format the strings for the queries
	$line = str_replace("A ", '', $line);
	$line = str_replace(' ', "%20", $line);
	$line = str_replace('-', "%2D", $line);
	$line = preg_replace('/\s+/', '', $line);
	$url = 'http://www.omdbapi.com/?t='.$line;

	// run the request to the scraper
	$html = file_get_contents($url); 

	// pull out the important information from the request
	$_SESSION['movie'] = json_decode($html, true);

	// insert movie if it doesn't already exist in the database
	if (!array_key_exists('Error', $_SESSION['movie']))
	{ 
 		include 'insertMovie.php';
	}
}

echo '			</table>';
echo '			</div>';
echo '		</div>';
 
$_SESSION['movies'] = array();
?>
