<?php
// db connection
   include_once ("DBConnect.php"); 

   if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
   $placeID =  $_SESSION['placeId'];
    if (!empty($placeID)){
        $rawRevResults = mysqli_query($connect, "SELECT * FROM eateryreview WHERE (`place_id` LIKE '%".$placeID."%')");
    }
    $numOfUserReview = 0;
    $authorResults = [];
    $reviewResults = [];
    $userRatingResults = [];
    $dateResults = [];
    if ($rawRevResults != FALSE){
         $numOfUserReview = mysqli_num_rows($rawRevResults);
        if($numOfUserReview > 0){ // if one or more rows are returned do following
            while($reviewRow = mysqli_fetch_array($rawRevResults, MYSQLI_ASSOC)){
                $authorResults[] =  $reviewRow['author'];  
                $reviewResults[] = $reviewRow['review'];
                $userRatingResults[] = $reviewRow['rating'];
                $dateResults[] = $reviewRow['date'];
                }
        }
    }
    else {
        $numOfUserReview = 0;
    }
?>
