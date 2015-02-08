<?php
$_SESSION['movieURL'] = 'http://php-jstakebake.rhcloud.com/movieLibrary/details/details.php?movie_id=';

// format movie title for insertion into the database
$_SESSION['movie']['Title'] = str_replace('\'', '', $_SESSION['movie']['Title']);
$_SESSION['movieFile'] = str_replace('\'', '', $_SESSION['movieFile']);
$_SESSION['movie']['Plot'] = str_replace('\'', '', $_SESSION['movie']['Plot']);

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


// grab movie names
$sql = "SELECT movie_display_name FROM movies";
$result = $conn->query($sql);

// set the bool for if movie already exists in the database
$movieMatch = False;

// verify that the movie doesn't exist in the database
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        if ($row['movie_display_name']== $_SESSION['movie']['Title']) 
        {
            $movieMatch = True;
            break;
        }
    }
} 

// variable to keep track of rows for display
$_SESSION['i']++;

// dispay the movies
if ($_SESSION['i'] == 1) {
    echo '<tr><th colspan="5" >Movies Added</th></tr>';
}

// insert movie into the database
if ($movieMatch == False)
{
    $movie_id = str_replace(' ', "%20", $_SESSION['movie']['Title']);
    $movie_id = str_replace('-', "%2D", $movie_id);
    $movie_id = preg_replace('/\s+/', '', $movie_id);    

    // insert into the movie table
    $sql = "INSERT INTO movies (movie_id, movie_name, movie_display_name, movie_link)
    VALUES (NULL, '".$_SESSION['movieFile']."', '".$_SESSION['movie']['Title']."', '"
            .$_SESSION['movieURL'].$movie_id."')";
    
    if ($conn->query($sql) === TRUE) 
    {
        
        if ($_SESSION['i'] % 5 == 1) 
        {
            echo '<tr>';
        }
        echo '<td><img alt="Image not Available!" width="214" height="317" src="'
             .$_SESSION['movie']['Poster'].'"></a><br/><span>'
             .$_SESSION['movie']['Title'].'</span></td>';
        if ($_SESSION['i'] % 5 == 0) 
        {
            echo '</tr>';
        }
    } 
    // for debugging
    /*else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    // insert into the details table
    $sql = "INSERT INTO details (details_id, movie_id, movie_poster, movie_synopsis, mpaa_rating)
    VALUES (NULL, (SELECT movie_id FROM movies WHERE movie_display_name='".$_SESSION['movie']['Title']."'), '".$_SESSION['movie']['Poster']."', '".$_SESSION['movie']['Plot']."', '".$_SESSION['movie']['Rated']."')";

    
    if ($conn->query($sql) === TRUE) 
    {
        //echo "New record created successfully";
    } 
    // for debugging
    /*else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
}


// close the database connection
$conn->close();

?>