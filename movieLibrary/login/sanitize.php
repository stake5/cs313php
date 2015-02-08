<?php

//To SANITIZE String value use
function StringInputCleaner($data)
{
	//remove space bfore and after
	$data = trim($data);
	
	//remove slashes
	$data = stripslashes($data);
	$data=(filter_var($data, FILTER_SANITIZE_STRING));
	return $data;
}

?>