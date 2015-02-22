<?php
include '../sanitize.php';
if ($_SESSION['logged_in'] == FALSE)
{
    // get and sanitize input
    $username = StringInputCleaner($_POST['user_name']);
    $password = StringInputCleaner($_POST['user_password']);


    include '../dbConnect.php';

    echo $username." = ";

    $sql = "SELECT user_password, user_permissions FROM user WHERE user_name='".$username."'";
    $result = $conn->query($sql);


    $passwordMatch = FALSE;
    if ($result->num_rows > 0) 
    {
        

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['user_password'])) 
        {
            $passwordMatch = TRUE;
            $_SESSION['permissions'] = $row['user_permissions'];
        }
        else
        {
            $passwordMatch = FALSE;
        }
    } 

    if ($passwordMatch == FALSE || $_SESSION['logged_in'] == TRUE)
    {
    	$_SESSION['login_attempts'] += 1;
    	$conn->close();
        header('Location: ../login/login.php');
    }
    else
    {
        $_SESSION['logged_in'] = TRUE;
    }

    // close the database connection
    $conn->close();
}
?>