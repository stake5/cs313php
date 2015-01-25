<?php 
session_start();

include 'navigation.html';

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="survey.css">';
echo '		<script src="survey.js"></script>';
echo '	</head>';
echo '	<body>';
echo '		<div id="main">';
echo '			<div id="content">';
echo '				<h1>OS Survey</h1>';
echo '				<div id="assignDiv">';
echo '					<form name="survey" action="updateResults.php" method="post" onsubmit="return validateForm()">';
echo '						<hr />';
echo '						<label>What is your favorite brand of OS?</label><br />';
echo '						<input class="surveyQ" type="radio" value="Windows" name="q1">Windows<br />';
echo '						<input class="surveyQ" type="radio" value="Mac OS" name="q1">Mac OS<br />';
echo '						<input class="surveyQ" type="radio" value="Linux" name="q1">Linux<br />';
echo '						<hr />';
echo '						<label>Do you believe each of these OSs has their own advantages?</label><br />';
echo '						<input class="surveyQ" type="radio" value="Yes" name="q2">Yes<br />';
echo '						<input class="surveyQ" type="radio" value="No" name="q2">No<br />';
echo '						<hr />';
echo '						<label>Do you dual boot or use more than one of the OSs?</label><br />';
echo '						<input class="surveyQ" type="radio" value="Yes" name="q3">Yes<br />';
echo '						<input class="surveyQ" type="radio" value="No" name="q3">No<br />';
echo '						<hr />';
echo '						<label>Which OSs do you use?</label><br />';
echo '						<input class="surveyQ" type="checkbox" name="q4[]" value="Linux">Linux<br />';	
echo '						<input class="surveyQ" type="checkbox" name="q4[]" value="Mac OS">Mac OS<br />';;
echo '						<input class="surveyQ" type="checkbox" name="q4[]" value="Windows">Windows<br />';
echo '						<hr />';
if ($_SESSION['voted'] == 0) {
	echo '						<input type="submit" id="btnSubmit" value="Submit">';
} else {
	echo '<label>You have already voted!</label>';
}
echo '					</form>';
echo '					<hr />';
echo '					<a href="displayResults.php" >Results</a>';
echo '				</div>';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>
