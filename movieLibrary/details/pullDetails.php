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
$sql = "SELECT movies.movie_display_name, details.movie_poster
        , details.movie_synopsis, details.mpaa_rating
        FROM movies
        INNER JOIN details
        ON movies.movie_id=details.movie_id
        WHERE movie_display_name='".$movie_id."'
        ORDER BY movies.movie_display_name;";
$result = $conn->query($sql);

// display each movie in the list
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo '<table id="movieDetails">';
        echo '  <tr><th colspan="5">Movie Details</th></tr>';
        echo '  <tr>';
        echo '      <td colspan="2">';
        echo '          <ul>';
        echo '              <li><p class="movieInfo">'.$row['movie_display_name']
            .'</p></li>';
        echo '              <li><div class="wrapper"><img src="'.$row['movie_poster'].'" /></div></li>';
        echo '              <li><p class="movieInfo">Rating : '.$row['mpaa_rating'].'<p></li>';
        echo '          </ul>';
        echo '      </td>';
        echo '      <td colspan="3"><p id="synopsis">'.$row['movie_synopsis'].'</p></td>';
        echo '  </tr>';
        echo '  <tr>';
        echo '      <td></td>';
        echo '      <td></td>';
        echo '      <td></td>';
        echo '      <td></td>';
        echo '      <td></td>';
        echo '  </tr>';
        echo '</table>';
    }
}

// close the database connection
$conn->close();

?>