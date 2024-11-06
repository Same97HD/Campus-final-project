<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "toms_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn){
    echo "Connection Failed!";
}

?>