<?php
// db connection
include_once ("DBConnect.php");
if (!isset($_SESSION)) {
    session_start();
}


$rawResults = mysqli_query($connect, "SELECT DISTINCT TOP 10 FROM EateryInfo WHERE (`views` > 0) ORDER BY `views` DESC");


$nameResults = [];
$photoResults = [];
$locationResults = [];
$ratingResults = [];
$openResults = [];
$placeIdResults = [];
$geometryLatitude = [];
$geometryLongitude = [];
if ($rawResults != FALSE) {
    $numOfResults = mysqli_num_rows($rawResults);
    if ($numOfResults > 0) { // if one or more rows are returned do following
        while ($row = mysqli_fetch_array($rawResults, MYSQLI_ASSOC)) {
            //$table_data[]= array("id=>"$row['place_id'],"name=>"$row['name'],"photo=>"$row['photo'],"location=>"$row['formatted_address'],"rating=>"$row['rating'], "open=>"$row['open'],"geometryLatitude=>"$row['geometry_latitude'],"geometryLongitude=>"$row['geometry_longitude']);
            $nameResults[] = $row['name'];
            $photoResults[] = $row['photo'];
            $locationResults[] = $row['formatted_address'];
            $ratingResults[] = $row['rating'];
            $openResults[] = $row['open'];
            $placeIdResults[] = $row['place_id'];
            $geometryLatitude[] = $row['geometry_latitude'];
            $geometryLongitude[] = $row['geometry_longitude'];
        }
    }
} else {
    $numOfResults = 0;
}

if (basename(filter_input(INPUT_SERVER, 'PHP_SELF')) === 'eateryHomepage.php') {
    //$_SESSION['placeId'] = $userSearch;
}
?>
<!DOCTYPE html>