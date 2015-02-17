SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS moviedb;

USE moviedb;

-- preperation for creatign movies table
DROP TABLE IF EXISTS movies;

-- create the movies table
CREATE TABLE movies
( movie_id 			 INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, movie_name 		 CHAR(100) NOT NULL
, movie_display_name CHAR(100) NOT NULL
, movie_link 		 TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- preperation for creating star table
DROP TABLE IF EXISTS star;

-- create the star table
CREATE TABLE star
( star_id 			 INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, star_name		     CHAR(100) NOT NULL
, imdb_link			 CHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- preperation for creating movie_star_lookup table
DROP TABLE IF EXISTS movie_star_lookup;

-- create the movie_star_lookup table
CREATE TABLE movie_star_lookup
( movie_star_id		 INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, movie_id		     INT UNSIGNED NOT NULL
, star_id			 INT UNSIGNED NOT NULL
, CONSTRAINT movie_star_lookup_fk1 FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
, CONSTRAINT movie_star_lookup_fk2 FOREIGN KEY (star_id) REFERENCES star(star_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- preperation for creating Details table
DROP TABLE IF EXISTS details;

-- create the details table
CREATE TABLE details
( details_id 		 INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, movie_id           INT UNSIGNED NOT NULL
, movie_poster 		 CHAR(128) 	  NOT NULL
, movie_synopsis     TEXT	 	  NOT NULL
, mpaa_rating        CHAR(10)  	  NOT NULL
, CONSTRAINT details_fk1 FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- preperation for creating user table
DROP TABLE IF EXISTS user;

-- create the user table
CREATE TABLE user
( user_id		   INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, user_name		   CHAR(100) NOT NULL
, user_password	   CHAR(100) NOT NULL
, user_permissions INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SHOW TABLES;
DESC movies;
DESC star;
DESC movie_star_lookup;
DESC details;
DESC user;


INSERT INTO user VALUES
(	NULL
	, 'admin'
	, 'adminpassword5824'
	, 2
);


select * from user;

INSERT INTO movies 
(movie_id
, movie_name
, movie_display_name
, movie_link)
VALUES 
(NULL
, 'knightsTale.mp4'
, 'A Knights Tale'
, ''
);
    
INSERT INTO details (details_id, movie_id, movie_poster, movie_synopsis, mpaa_rating)
    VALUES (NULL, (SELECT movie_id FROM movies WHERE movie_display_name='".$_SESSION['movie']['Title']."'), '".$_SESSION['movie']['Poster']."', '".$_SESSION['movie']['Plot']."', '".$_SESSION['movie']['Rated']."')";
