<?php
include_once ("AccountDBConnect.php");
if (!isset($_SESSION)) {
    session_start();
}
$userN = $_SESSION['username'];


$numOfResults = 0;
$searchHistID = [];
$searchHist = [];
$rawResults = mysqli_query($connect, "SELECT * FROM searchhistory WHERE (username ='$userN') ORDER BY history_id DESC LIMIT 10");
if ($rawResults != FALSE) {
    $numOfResults = mysqli_num_rows($rawResults);

    if ($numOfResults > 0) { // if one or more rows are returned do following
        while ($row = mysqli_fetch_array($rawResults, MYSQLI_ASSOC)) {
            $placeIdHist[] = $row['place_id'];
        }
    }
}

include_once ("DBConnect.php");
for ($i = 0 ; $i < $numOfResults; $i ++){
    $rawResults2 = mysqli_query($connect, "SELECT * FROM eateryinfo WHERE (place_id ='$placeIdHist[$i]')");
    if ($numOfResults > 0) { // if one or more rows are returned do following
        while ($row = mysqli_fetch_array($rawResults2, MYSQLI_ASSOC)) {
            $searchHist[] = $row['name'];
            $searchHistID[] = $row['place_id'];
        }
    }

}

?>