<?php

$_SESSION['movieURL'] = $_SESSION['mainURL'].'details/details.php?movie_id=';


// format movie title for insertion into the database
$_SESSION['movie']['Title'] = str_replace('\'', '', $_SESSION['movie']['Title']);
$_SESSION['movieFile'] = str_replace('\'', '', $_SESSION['movieFile']);
$_SESSION['movie']['Plot'] = str_replace('\'', '', $_SESSION['movie']['Plot']);

// initialize connection variables
$servername = "localhost";
$username = "airtime";
$password = "movies";
$dbname = "moviedb";

$submitted = TRUE;
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
        if ($row['movie_display_name']== $_SESSION['movie']['oldTitle']) 
        {
            $movieMatch = TRUE;
            break;
        }
    }
} 

// insert movie into the database
if ($movieMatch === TRUE)
{
    $movie_id = str_replace(' ', "%20", $_SESSION['movie']['Title']);
    $movie_id = str_replace('-', "%2D", $movie_id);
    $movie_id = preg_replace('/\s+/', '', $movie_id);    

    // update the movie table
    if (!empty($_SESSION['movie']['Title']))
    {
        $sql = "UPDATE movies 
                SET movie_display_name='".$_SESSION['movie']['Title']."'
                , movie_link='".$_SESSION['movieURL'].$movie_id."'
                WHERE movie_display_name='".$_SESSION['movie']['oldTitle']."';";

        if ($conn->query($sql) === TRUE) 
        {
            $updated = TRUE;
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $updated = FALSE;
        }

        if (!empty($_SESSION['movieFile']))
        {
            $sql = "UPDATE movies 
                    SET movie_name='".$_SESSION['movieFile']."' 
                    WHERE movie_display_name='".$_SESSION['movie']['Title']."';";

            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $updated = FALSE;
            }  
        }
        
        // update the details table
        if (!empty($_SESSION['movie']['Poster']))
        {
            $sql = "UPDATE details 
                    SET movie_poster='".$_SESSION['movie']['Poster']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['Title']."');";
            
            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
        if (!empty($_SESSION['movie']['Plot']))
        {
            echo $_SESSION['movie']['Plot'] . "is the plot<br/>";

            $sql = "UPDATE details 
                    SET movie_synopsis='".$_SESSION['movie']['Plot']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['Title']."');";
            
            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
        if (!empty($_SESSION['movie']['Rated']))
        {
            $sql = "UPDATE details 
                    SET mpaa_rating='".$_SESSION['movie']['Rated']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['Title']."');";

            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
    }
    else
    {
        if (!empty($_SESSION['movieFile']))
        {
            $sql = "UPDATE movies 
                    SET movie_name='".$_SESSION['movieFile']."' 
                    WHERE movie_display_name='".$_SESSION['movie']['oldTitle']."';";

            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $updated = FALSE;
            }  
        }
        
        // update the details table
        if (!empty($_SESSION['movie']['Poster']))
        {
            $sql = "UPDATE details 
                    SET movie_poster='".$_SESSION['movie']['Poster']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['oldTitle']."');";
            
            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
        if (!empty($_SESSION['movie']['Plot']))
        {
            echo $_SESSION['movie']['Plot'] . "is the plot<br/>";

            $sql = "UPDATE details 
                    SET movie_synopsis='".$_SESSION['movie']['Plot']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['oldTitle']."');";
            
            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
        if (!empty($_SESSION['movie']['Rated']))
        {
            $sql = "UPDATE details 
                    SET mpaa_rating='".$_SESSION['movie']['Rated']."' 
                    WHERE movie_id=(SELECT movie_id 
                                    FROM movies 
                                    WHERE movie_display_name='".$_SESSION['movie']['oldTitle']."');";

            if ($conn->query($sql) === TRUE) 
            {
                $updated = TRUE;
            } 
            else 
            {
                $updated = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
    } 
}  
else
{
    echo "Could not find a match for in the DB!<br/>";
}


// close the database connection
$conn->close();

?>