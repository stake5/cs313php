<?php
include 'sanitize.php';
if ($_SESSION['logged_in'] == False)
{
    // get and sanitize input
    $_SESSION['user_name'] = StringInputCleaner($_POST['user_name']);
    $_SESSION['user_password'] = StringInputCleaner($_POST['user_password']);
}

// initialize connection variables
$servername = "localhost";
$username = "airtime";
$password = "movies";
$dbname = "moviedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_password FROM user WHERE user_name='".$_SESSION['user_name']."'";
$result = $conn->query($sql);


$passwordMatch = False;
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        if ($row['user_password']== $_SESSION['user_password']) 
        {
        	$passwordMatch = True;
        	break;
        }
        elseif ($_SESSION) 
        {
            # code...
        }
    }
} 

if ($passwordMatch == False)
{
	$_SESSION['login_attempts'] += 1;
	$conn->close();
    header('Location: ../login/login.php');
}
else
{
    $_SESSION['logged_in'] = True;
}

// close the database connection
$conn->close();

?>