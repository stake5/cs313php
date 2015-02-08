<?php
echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="listView.css">';
echo '	</head>';
echo '	<body>';
echo '		<div>';
echo '			<table id="movieGrid">';
include 'getMovieGrid.php';
echo '			</table>';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>
