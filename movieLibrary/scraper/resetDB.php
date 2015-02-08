<?php

// initialize connection variables
$servername = "localhost";
$username = "airtime";
$password = "movies";
$dbname = "moviedb";
$script_path = './createMovieDB.sql';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// grab movie names
$sql = "mysql -u{$username} -p{$password} " . "-h {$servername} -D {$dbname} < {$script_path}";

$output = shell_exec($sql . '/createMovieDB.sql');

echo $output;
?>