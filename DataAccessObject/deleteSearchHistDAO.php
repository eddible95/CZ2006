<?php

    include 'AccountDBConnect.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    mysqli_query ($connect, "DELETE FROM searchhistory WHERE username = '".$_SESSION['username']."'"); 
    header("Location: ../searchHist.php");
    
    
?>