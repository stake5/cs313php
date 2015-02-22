<?php
include '../sanitize.php';

// get and sanitize input
$username = StringInputCleaner($_POST['user_name']);
$password = StringInputCleaner($_POST['user_password']);

include '../dbConnect.php';


// grab movie names
$sql = "SELECT user_name, user_password FROM user";
$result = $conn->query($sql);

// set the bool for if movie already exists in the database
$userMatch = FALSE;

// verify that the movie doesn't exist in the database
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        if ($row['user_name']== $username) 
        {
            $userMatch = TRUE;
            break;
        }
    }
} 

// insert movie into the database
$password = $password;
$password = password_hash($password, PASSWORD_DEFAULT);

if ($userMatch == FALSE)
{
    // insert into the movie table
    $sql = "INSERT INTO user ( user_id, user_name, user_password, user_permissions)
    VALUES (NULL, '".$username."', '".$password."', '0');";
    
    if ($conn->query($sql) === TRUE) 
    {
        echo 'Registration was successfull';
    } 
    // for debugging
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// close the database connection
$conn->close();

?>