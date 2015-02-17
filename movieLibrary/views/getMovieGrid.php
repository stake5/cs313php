<?php

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
$sql = "SELECT movies.movie_display_name, movies.movie_link
               , details.mpaa_rating, details.movie_poster
        FROM movies
        INNER JOIN details
        ON movies.movie_id=details.movie_id
        ORDER BY movies.movie_display_name;";
$result = $conn->query($sql);

// display each movie in the list
if ($result->num_rows > 0) 
{
    $i = 0;
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        $i++;
        if ($i % 5 == 1) 
        {
            echo '<tr>';
        }
        echo '<td><a href="'.$row['movie_link'].'"/><img alt="'.$row['movie_display_name'].'" width="214" height="317" src="'
             .$row['movie_poster'].'"></a><br/><span>Rating: '
             .$row['mpaa_rating'].'</span></td>';
        if ($i % 5 == 0) 
        {
            echo '</tr>';
        }
    }
}

// close the database connection
$conn->close();

?>