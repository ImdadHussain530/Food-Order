<?php
//start session
session_start();

//All constant define here 

define('SITEURL', 'http://localhost/food-order/');
define('SERVERNAME','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DBNAME','food-order');

// Create connection
$conn = new mysqli(SERVERNAME,USERNAME , PASSWORD, DBNAME) or die("Connection failed: " .mysqli_error($conn));
?>