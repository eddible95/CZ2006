<?php
// db connection
include_once ("DBConnect.php");
if (!isset($_SESSION)) {
    session_start();
}

//if (!mysqli_set_charset($connect, "utf8")) {
//    printf("Error loading character set utf8: %s\n", mysqli_error($connect));
//    exit();
//} else {
//    printf("Current character set: %s\n", mysqli_character_set_name($connect));
//}
if (!empty(filter_input(INPUT_GET, 'locationSearch'))) {
    $userSearch = filter_input(INPUT_GET, 'locationSearch');
    $rawResults = mysqli_query($connect, "SELECT * FROM EateryInfo WHERE (`formatted_address` LIKE '%" . $userSearch . "%')");
} else if (!empty(filter_input(INPUT_GET, 'eaterySearch'))) {
    $userSearch = filter_input(INPUT_GET, 'eaterySearch');
    if (strpos($userSearch, ', Singapore') !== false){
        $userSearch = str_replace(', Singapore', '', $userSearch);
    }
    $rawResults = mysqli_query($connect, "SELECT * FROM EateryInfo WHERE (`name` LIKE '%" . $userSearch . "%')");
} else if (!empty(filter_input(INPUT_GET, 'placeId'))) {
    $userSearch = filter_input(INPUT_GET, 'placeId');
    $rawResults = mysqli_query($connect, "SELECT * FROM EateryInfo WHERE (`place_id` = '$userSearch')");
}

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
    $_SESSION['placeId'] = $userSearch;
}
?>
<!DOCTYPE html>