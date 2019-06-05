<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) 
{
    if (basename(filter_input(INPUT_SERVER, 'PHP_SELF')) === 'homepage.php') {
        include 'loggedInNavBarHome.php';
    } 
    else {        
        include 'loggedInNavBar.php';
    }     

} 
else 
{
    if (basename(filter_input(INPUT_SERVER, 'PHP_SELF')) === 'homepage.php') {
        include 'homepageNavBar.php';
    } 
    else {
        include 'searchNavBar.php';
    }
}
?>