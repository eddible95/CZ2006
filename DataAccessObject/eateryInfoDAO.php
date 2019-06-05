<?php
// db parameter
include_once ("DBConnect.php"); 


$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));
$eateryNameArr = Array();
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryNameArr[] =  $row['name'];  
}

$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));

$eateryPhotoRefArr= [];
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryPhotoRefArr[] =  $row['photo'];  
}
$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));

$eateryLocIDArr= [];
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryLocIDArr[] =  $row['formatted_address'];  
}
$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));

$eateryRatingArr= [];
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryRatingArr[] =  $row['rating'];  
}
$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));

$eateryOpenArr= [];
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryOpenArr[] =  $row['open'];  
}
$eateryInfo = mysqli_query($connect,"SELECT * FROM EateryInfo  WHERE views >= '0' ORDER BY views DESC LIMIT 10")or die (mysqli_error($connect));

$eateryPlaceIDArr= [];
while ($row = mysqli_fetch_array($eateryInfo, MYSQLI_ASSOC)) {
$eateryPlaceIDArr[] =  $row['place_id'];  
}
?>