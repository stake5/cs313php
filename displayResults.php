<?php

include 'navigation.html';

# get the data from my file
$myfile = fopen("surveyCount.txt", "r") or die("Unable to open file!");
$temp = fgets($myfile);
$info = array_map('intval', explode(" ", $temp));
fclose($myfile);

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="survey.css">';
echo '	</head>';
echo '	<body>';
echo '		<div id="main">';
echo '			<div id="content">';
echo '				<h1>OS Survey Results</h1>';
echo '				<div id="assignDiv">';
echo '						<hr />';
echo '						<label>What is your favorite brand of OS?</label><br />';
echo '						<label>Windows: ' . $info[0] . '</label><br />';
echo '						<label>Mac OS: ' . $info[1] . '</label><br />';
echo '						<label>Linux: ' . $info[2] . '</label><br />';
echo '						<hr />';
echo '						<label>Do you believe each of these OSs has their own advantages?</label><br />';
echo '						<label>Yes: ' . $info[3] . '</label><br />';
echo '						<label>No: ' . $info[4] . '</label><br />';
echo '						<hr />';
echo '						<label>Do you dual boot or use more than one of the OSs?</label><br />';
echo '						<label>Yes: ' . $info[5] . '</label><br />';
echo '						<label>No: ' . $info[6] . '</label><br />';
echo '						<hr />';
echo '						<label>Which OSs do you use?</label><br />';
echo '						<label>Linux: ' . $info[7] . '</label><br />';
echo '						<label>Mac OS: ' . $info[8] . '</label><br />';
echo '						<label>Windows: ' . $info[9] . '</label><br />';
echo '				</div>';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';

 ?>