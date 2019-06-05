<?php
// db parameter
$host = "localhost";
$user = "root";
$pass = "";
$db = "eatery";

//connect and select the database
$connect = mysqli_connect($host, $user,$pass,$db) or die('Database Not Connected. Please Fix the Issue! ' . mysqli_error($connect));
mysqli_set_charset($connect, "utf8");

?>