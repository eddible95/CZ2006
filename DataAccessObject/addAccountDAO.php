<?php
                            /*------------------------------------------------------------*
                             *                 Connection to the database                 *
                             *----------------------------------------------------------- */
// db parameter
include_once ("AccountDBConnect.php"); 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
                            /*------------------------------------------------------------*
                             *          Creation of new entry into user database          *
                             *----------------------------------------------------------- */
// Getting the user input data from 'signUpPage.php'
$successfulSignUp = false;
$signUp = false;
$newEmail = filter_input(INPUT_POST, 'emailAddress');
$newUser = filter_input(INPUT_POST, 'username');
$newPassword = filter_input(INPUT_POST, 'password');
$cfmPassword = filter_input(INPUT_POST, 'cfmPassword');
$signUp =  filter_input(INPUT_POST, 'signUp');
$userLen = false;
$passLen = false;
$passCondition = false;
$emailCondition = false;
$cfmPasswordCondition = false;
$exist = false;

// Check if email is valid
if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
  $emailCondition = true;
}

// Check if user matches the conditions set
if (strlen($newUser) >= 8 && strlen($newUser) <=32){
    $userLen = true;
}

// Check if password matches a certain strength
if (strlen($newPassword) >= 8 && strlen($newPassword) <=32){
    $passLen = true;
}
if (preg_match("/[A-Z]/", $newPassword) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $newPassword)){
    $passCondition = true;
}

if ($newPassword === $cfmPassword){
    $cfmPasswordCondition = true;
}

                            /*------------------------------------------------------------*
                             *             Verification against the database              *
                             *              to check for duplicate username               *
                             *------------------------------------------------------------*/
$query = "SELECT * FROM userinformation WHERE username = '". mysqli_real_escape_string($connect,$newUser) ."'";
$result = mysqli_query($connect,$query);
if (mysqli_num_rows($result) == 1) {  //username does not exist --> results = -1
    $exist = true;
    $successfulSignUp= false;
} 
                            /*------------------------------------------------------------*
                             *             If no duplicates then the new user             *
                             *             is created and added to the database           *
                             *------------------------------------------------------------*/
else if($userLen == true && $passLen == true && $passCondition == true && $emailCondition == true && $cfmPasswordCondition == true) {
        $sql = "INSERT INTO userinformation (username, password, email)
        VALUES ('$newUser', '$newPassword', '$newEmail')";
        if (mysqli_query($connect, $sql)) {
//            echo "<p align='center'> <font color=red  size='6pt'>New record created successfully</font> </p>";
           $successfulSignUp = true;
           $_SESSION['loggedIn'] = true;
           $_SESSION['username'] = $newUser;
           header("Location: ../homepage.php");
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            header("Location: signUpPage.php");
        }
    }
else{
   $successfulSignUp = false;
}
?>  
     