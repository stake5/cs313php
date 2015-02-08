<?php
echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="listView.css">';
echo '	</head>';
echo '	<body>';
echo '		<div>';
echo '			<div id="names">';
echo '				<ul id="movieList">';
include 'getMovieList.php';
echo '				</ul>';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>
