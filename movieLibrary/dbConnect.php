<?php
// initialize connection variables
$servername = "localhost";
$dbusername = "airtime";
$dbpassword = "movies";
$dbname = "moviedb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


// grab movie names
$sql = "SELECT user_name, user_password FROM user";
$result = $conn->query($sql);

?>