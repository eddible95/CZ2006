<?php
                            /*------------------------------------------------------------*
                             *                 Connection to the database                 *
                             *----------------------------------------------------------- */
// db parameter
include_once ("AccountDBConnect.php"); 
// Getting the user input data from 'loginPage.php'
$user = filter_input(INPUT_GET, 'username');
$password = filter_input(INPUT_GET, 'password');   

                            /*-------------------------------------------------------------*
                             *               Verification against the database             *
                             *-------------------------------------------------------------*/
$query = "SELECT * FROM userinformation WHERE username = '". mysqli_real_escape_string($connect,$user) ."' "
        . "AND password = '". mysqli_real_escape_string($connect,$password) ."'" ;
$result = mysqli_query($connect,$query);
if (mysqli_num_rows($result) == 1) {
        echo "<p align='center'> <font color=red  size='6pt'>Verification Successful!</font> </p>"; 
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user;
//        setcookie("username", $username, time()+3600, "/");  
//        setcookie("password", $password, time()+3600, "/");  
        header("Location: ../homepage.php");
    } 
else {
        echo "<p align='center'> <font color=red  size='6pt'>Verification Unsuccessful!</font> </p>"; 
        session_start();
        $_SESSION['loggedIn'] = false;
        header("Location: ../loginPage.php");
    }
    
    
?>