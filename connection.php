<?php

$dbhost = "localhost";
$dbuser = "Sameera";
$dbpassword = "sameera@1123";
$dbname = "toms_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn){
    echo "Connection Failed!";
}

?>