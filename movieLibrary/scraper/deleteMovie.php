<?php
session_start();
//include '../login/loginCheck.php';

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

if (!empty($_POST['delMovies']) && !empty($_POST['delete'])) 
{
	foreach ($_POST['delete'] as $key => $movie_id) {
		$sql = "DELETE FROM details WHERE movie_id='".$movie_id."';";

		if ($conn->query($sql) === TRUE) 
	    {
	        //echo "record deleted successfully";
	    } 
	    // for debugging
	    else 
	    {
	        echo "Error: " . $sql . "<br>" . $conn->error;
	    }

	    $sql = "DELETE FROM movies WHERE movie_id='".$movie_id."';";

		if ($conn->query($sql) === TRUE) 
	    {
	        //echo "record deleted successfully";
	    } 
	    // for debugging
	    else 
	    {
	        echo "Error: " . $sql . "<br>" . $conn->error;
	    }
	}
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '	<head>';
echo '		<link rel="stylesheet" type="text/css" href="../views/listView.css">';
echo '		<link rel="stylesheet" type="text/css" href="../navigation/navigation.css">';
echo '	</head>';

include '../navigation/navigation.html';

echo '	<body>';
echo '		<div>';
echo '			<div id="names">';
echo '			<form action="deleteMovie.php" method="post">';
echo '				<ul id="movieList">';

// grab movie names
$sql = "SELECT movies.movie_id, movies.movie_display_name, movies.movie_link, details.mpaa_rating
        FROM movies
        INNER JOIN details
        ON movies.movie_id=details.movie_id
        ORDER BY movies.movie_display_name;";
$result = $conn->query($sql);

// display each movie in the list
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo '<li class="movie"><input type="checkbox" name="delete[]" value="'.$row['movie_id'].'"><a href='.$row['movie_link'].'> '.$row['movie_display_name'].'</a>';
        echo '<span>Rating: '.$row['mpaa_rating'].'</span></li><hr/>';
    }
}

// close the database connection
$conn->close();

echo '				</ul>';
echo '				<input type="submit" name="delMovies" value="Delete Movies" />';
echo '			</form>';
echo '			</div>';
echo '		</div>';
echo '	</body>';
echo '</html>';
?>