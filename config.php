<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mango');
define('DB_PASSWORD', 'abc@123');
define('DB_NAME', 'dbmango');

/* Attempt to connect to MySQL database */
$dbcon = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($dbcon === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    return $dbcon;
}
