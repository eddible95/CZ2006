<?php

//To track the views for each eatery homepage
include 'DBConnect.php';
    if (!empty($_GET['placeId'])) {
        $placeId = $_GET['placeId'];
    }
    // Gets current views value
    $query = "SELECT views FROM eateryinfo WHERE place_id='$placeId'";
    $result = $connect->query($query);

    // Fetching existing views value and updating it
    while ($row = $result->fetch_assoc()) {
        $count1 = $row['views'];
        $count_new = $count1 + 1;
        $sql = "UPDATE eateryinfo SET views = '$count_new' WHERE place_id='$placeId'";
    }
    if ($connect->query($sql) !== TRUE) {
        echo "Error updating record: " . $connect->error;
    }
    //Track User's Search History
    include 'AccountDBConnect.php';

    if (!empty($_GET['placeId'])) {
        $placeId = $_GET['placeId'];
    }
//    //Update Search History only if logged in
//    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
//        $user_name = $_SESSION['username'];
//        $sql = "INSERT INTO searchhistory (username, place_id) VALUES ('$user_name', '$placeId')";
//        mysqli_query($connect, $sql);
//    }
     //Update Search History only if logged in
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
            //Update only unique place_id
            $query = "SELECT * FROM searchhistory WHERE place_id = '". mysqli_real_escape_string($connect,$placeId) ."'";
            $result = mysqli_query($connect,$query);
            if(!mysqli_num_rows($result) == 1){
                $user_name = $_SESSION['username'];
                $sql = "INSERT INTO searchhistory (username, place_id) VALUES ('$user_name', '$placeId')";
                mysqli_query($connect, $sql);
            }
        }

?>

