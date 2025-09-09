<?php

//main connection file for both admin & front end
$servername = "localhost"; //server - will be provided by InfinityFree
$username = "root"; //username - will be provided by InfinityFree
$password = "Satej@25102004"; //password - will be provided by InfinityFree
$dbname = "onlinefoodphp";  //database - will be provided by InfinityFree

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>