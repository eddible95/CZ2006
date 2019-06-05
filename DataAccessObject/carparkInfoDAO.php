<?php 
 
    // get the contents of the JSON file
    $carparkJsonData = file_get_contents('database/carparkAPI.json');
    
    //decode JSON data to PHP array
    $carparkContent = json_decode($carparkJsonData, true);
    
    $totalCarpark = sizeof($carparkContent['value']);
    
    $carparkID = [];
    $carparkDev = [];
    $carparkLat = [];
    $carparkLng = [];
    $carparkLots = [];
    $carparkLotType = [];
    
    for ($i = 0; $i < $totalCarpark; $i++) {
        array_push($carparkID, $carparkContent['value'][$i]['CarParkID']);
        array_push($carparkDev, $carparkContent['value'][$i]['Development']);
        array_push($carparkLat, preg_split("/\s+/",$carparkContent['value'][$i]['Location'])[0]);
        array_push($carparkLng, preg_split("/\s+/",$carparkContent['value'][$i]['Location'])[1]);
        array_push($carparkLots, $carparkContent['value'][$i]['AvailableLots']);
        array_push($carparkLotType, $carparkContent['value'][$i]['LotType']);

    }
    
    
?>