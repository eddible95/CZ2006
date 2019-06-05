<?php
// db parameter
include_once ("DBConnect.php"); 
 
// get the contents of the JSON file
$eateryJsonData = file_get_contents('../database/eateryAPI.json'); // "../" to get from parent file


//decode JSON data to PHP array
$eateryContent = json_decode($eateryJsonData, true);

$columnNames = array('formatted_address', 'geometry_latitude', 'geometry_longitude', 'name', 'open', 'photo', 'place_id', 'rating');


//Fetch the details of eateryContent;

$totalEatery = sizeof($eateryContent['results']);

for($i=0; $i<$totalEatery; $i++) {


if ((isset($eateryContent['results'][$i]['formatted_address']))){
$formatted_address = $eateryContent['results'][$i]['formatted_address'];
$formatted_address = str_replace("'",'"', $formatted_address);
}
else{
$formatted_address = NULL;
}
$geometry_latitude = $eateryContent['results'][$i]['geometry']['location']['lat'];
$geometry_longitude = $eateryContent['results'][$i]['geometry']['location']['lng'];
$name = $eateryContent['results'][$i]['name'];
$name = str_replace("'",'"', $name);

if ((isset($eateryContent['results'][$i]['opening_hours']['open_now']))){
$open = $eateryContent['results'][$i]['opening_hours']['open_now'];
}
else{
$open = NULL;
}

if ((isset($eateryContent['results'][$i]['photos']))){
$photo = $eateryContent['results'][$i]['photos'][0]['photo_reference'];
}
else{
$photo = NULL;
}

$place_id = $eateryContent['results'][$i]['place_id'];

if ((isset($eateryContent['results'][$i]['rating']))){
$rating =  $eateryContent['results'][$i]['rating'];
}
else{
$rating = NULL;
}

//Insert the fetched Data into Database
$query = "INSERT IGNORE INTO `EateryInfo`(
`$columnNames[0]`,
`$columnNames[1]`,
`$columnNames[2]`,
`$columnNames[3]`,
`$columnNames[4]`,
`$columnNames[5]`,
`$columnNames[6]`,
`$columnNames[7]`)
VALUES(
'$formatted_address',
'$geometry_latitude',
'$geometry_longitude',
'$name',
'$open',
'$photo',
'$place_id',
'$rating');
";


if(!mysqli_query($connect,$query))
{
die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($connect));
}
else{
echo "Data Inserted Successully!!!";
}

}

$resultPlaceId = mysqli_query($connect, "SELECT * FROM EateryInfo");

if(!$resultPlaceId) {
die("Oh crap...: " . mysqli_error($connect));
}
else {
echo "Retrieved placeId results Successfully~";
}

$result = mysqli_query($connect, "SELECT * FROM EateryInfo");
$resultArray = Array();
while ($row = mysqli_fetch_array($result)) {
$resultArray[] =  $row['place_id'];  
}
?>



