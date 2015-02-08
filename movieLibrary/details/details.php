<?php  

$movie_id=$_REQUEST['movie_id'];
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';

session_start();

include '../login/loginCheck.php';
include '../navigation/navigation.html';

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="./detailsView.css">';
echo '		<link rel="stylesheet" type="text/css" href="listView.css">';
echo '	</head>';
echo '	<body>';
echo '		<div>';
echo '			<div id="detContainer">';
include 'pullDetails.php';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';

?>