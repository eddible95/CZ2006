<?php 
    include_once ("DBConnect.php"); 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (!empty(filter_input(INPUT_GET, 'placeId'))){
    $userSearch = filter_input(INPUT_GET, 'placeId');
    $_SESSION['placeId'] = $userSearch;
    $rawResults = mysqli_query($connect, "SELECT * FROM EateryInfo WHERE (`place_id` = .$userSearch)");
}

include_once("eaterResultsDAO.php");


?>