<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test_db');

error_reporting(1); 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 
// Check connection
if($conn === false){
	// to check type of error mysqli_connect_error()
    die("<h1 style='color:red;'>ERROR: Couldn't connect to database</h1>" );
}

?>