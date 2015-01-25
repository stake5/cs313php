<?php 
session_start(); 

$_SESSION['voted'] = 1;

# get the data from my file
$myfile = fopen("surveyCount.txt", "r") or die("Unable to open file!");
$temp = fgets($myfile);
$info = array_map('intval', explode(" ", $temp));
fclose($myfile);

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];

if ($q1 == 'Windows') {
	$info[0] = $info[0] + 1;
}
elseif ($q1 == 'Mac OS') {
	$info[1] = $info[1] + 1;
}
elseif ($q1 == 'Linux') {
	$info[2] = $info[2] + 1;
}

if ($q2 == 'Yes') {
	$info[3] = $info[3] + 1;
}
elseif ($q2 == 'No') {
	$info[4] = $info[4] + 1;
}

if ($q3 == 'Yes') {
	$info[5] = $info[5] + 1;
}
elseif ($q3 == 'No') {
	$info[6] = $info[6] + 1;
}

foreach ($q4 as $key => $value) {
	if ($value == "Linux") {
		$info[7] = $info[7] + 1;
	}
	elseif ($value == "Mac OS") {
		$info[8] = $info[8] + 1;
	}
	elseif ($value == "Windows") {
		$info[9] = $info[9] + 1;
	}
}
	
# write data to my file
$myfile = fopen("surveyCount.txt", "a") or die("Unable to open file!");
@ftruncate($myfile, 0);
for ($i = 0; $i < sizeof($info); $i++) {
	if (($i + 1) < sizeof($info)) {
		$info[$i] = $info[$i] . " ";
	}
	fwrite($myfile, $info[$i]);
}
fclose($myfile);

header('Location: displayResults.php');

?>
