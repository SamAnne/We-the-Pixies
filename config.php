<?php
	//Add database information to make connection
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'rachelsuter');
	define('DB_PASSWORD', 'Research1!'); 
	define('DB_NAME', 'rachelsuter');

	$dbc = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if($dbc === false){
    		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>
