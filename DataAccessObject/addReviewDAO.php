<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$rating = filter_input(INPUT_POST, 'rating');
$review = filter_input(INPUT_POST,'review');
$placeID = filter_input(INPUT_POST,'placeID');
$author = $_SESSION['username'];
date_default_timezone_set('Asia/Singapore');
$timestamp = time();
$date = date('d/m/Y', time());
include_once ("DBConnect.php"); 

//$jsonString = '{"author":' .$author. ', "review":' .$review. '}';

/* use json_decode to create an array from json */

//$sql = "UPDATE EateryInfo (review) VALUES ('$jsonString')
//             WHERE (`place_id` LIKE '%".$placeID."%')";
$sql = "INSERT INTO eateryreview (rating,review,place_id,author,date) VALUES ('$rating','$review','$placeID','$author','$date')";
if(mysqli_query($connect, $sql)){
    $successfulReview = true;
    header('Location: ../eateryHomepage.php?placeId='.$placeID. '&successfulReview='.$successfulReview);

} 
else{
     $successfulReview = false;
     $numOfUserReview = 0;
    header('Location: ../eateryHomepage.php?placeId='.$placeID. '&successfulReview='.$successfulReview);
}


?>
