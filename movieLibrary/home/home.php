<?php
// start the session and include all needed stylesheets
echo '<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
session_start();

include '../login/loginCheck.php';
include '../navigation/navigation.html';
if ($_SESSION['view'] == "grid") 
{
    include '../views/gridView.php';
}
else
{
    include '../views/listView.php';
}

?>