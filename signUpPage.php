    <html>
    <head>
        <title>
            Account Login
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">

        <!-- css -->
        <link href="css/homepage.css" rel="stylesheet" type="text/css"/>
        <link href="css/accountPage.css" rel="stylesheet" type="text/css"/>
        <?php include 'checkLogInStatus.php' ?>
        <?php include 'DataAccessObject/addAccountDAO.php' ?>

    </head>
    <body>


        <div class="accWindowContainer">
            <div class="col-md-4 col-md-offset-4"> 
                <div class="accWindow">
                    <div class="tabs" id="accTab">
                        <ul class="tabLinks" id="accTabLinks">
                            <li class="col-md-6">
                                <a href="/loginPage.php">Login</a>
                            </li>
                            <li class="active col-md-6">
                                <a href="/signUpPage.php">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tabContent" id="accTabBar">
                            <div id="loginTab" class="tab">
                                <form action="DataAccessObject/verifyAccountDAO.php" class="accForm" id="loginForm" method = "get">
                                    <label class="accLabel">Username:</label>
                                    <input type="text" name="username" class="form-control accInputBox">
                                    <label class="accLabel">Password:</label>
                                    <input type="password" name="password" class="form-control accInputBox">
                                    <p class="loginResponse">
                                        <span><a href="#">Forgot password?</a></span>
                                        <button type="submit" class="btn btn-success formLoginBtn">Login</button>
                                    </p>
                                </form>
                            </div>
                            <div id="signUpTab" class="tab active">
                                <form action="signUpPage.php" class="accForm" id="signUpForm" method = "post">
                                <label class="accLabel">Email Address:</label> <div class="hidden signUpErrorMsg" id="emailAddressMsg"></div>
                                <input id = "emailAddress" type="text" name="emailAddress" class="form-control accInputBox signUpInput">
                                <label class="accLabel">Username:</label> <div class="hidden signUpErrorMsg" id = "usernameMsg"></div>
                                <input id = "username" type="text" name="username" class="form-control accInputBox signUpInput">
                                <label class="accLabel">Password:</label> <div class="hidden signUpErrorMsg" id="passwordMsg"></div>
                                <input id ="password" type="password" name="password" class="form-control accInputBox signUpInput">
                                <label class="accLabel">Password Confirmation:</label> <div class="hidden signUpErrorMsg" id="cfmPasswordMsg"></div>
                                <input id = "cfmPassword" type="password" name="cfmPassword" class="form-control accInputBox signUpInput">
                                <input name ="signUp" value ="true" type="hidden">
                                <button type="submit" class="btn btn-danger">Sign Up</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        var signUp = <?php echo json_encode($signUp) ?>;
        var successfulSignUp = <?php echo json_encode($successfulSignUp) ?>;
        if (successfulSignUp == false && signUp === "true"){        
            displayErrorMsg();
        }
        function displayErrorMsg(){
            console.log("error");
            var emailFormat =  <?php echo json_encode($emailCondition) ?>;
            var userLen = <?php echo json_encode($userLen) ?>;
            var userExist = <?php echo json_encode($exist) ?>;
            var passwordLen =  <?php echo json_encode($passLen) ?>;
            var passFormat =  <?php echo json_encode($passCondition) ?>;
            var emailAddress = <?php echo json_encode($newEmail) ?>;
            var username = <?php echo json_encode($newUser) ?>;          
            var password = <?php echo json_encode($newPassword) ?>;    
            var cfmPassword = <?php echo json_encode($cfmPassword) ?>;
            var samePassword = <?php echo json_encode($cfmPasswordCondition)?>;
            if (emailAddress === ""){
                document.getElementById("emailAddressMsg").innerHTML = "* This field cannot be left blank!";
                $("#emailAddressMsg").removeClass('hidden');
                $("#signupForm.accForm").css("paddingTop","15%");
            } 
            if (username === ""){
                document.getElementById("usernameMsg").innerHTML = "* This field cannot be left blank!";
                $("#usernameMsg").removeClass('hidden');
                $("#signupForm.accForm").css("paddingTop","15%");
            } 
            if (password === ""){
                document.getElementById("passwordMsg").innerHTML = "* This field cannot be left blank!";
                $("#passwordMsg").removeClass('hidden');
                $("#signupForm.accForm").css("paddingTop","15%");
            } 
            if (cfmPassword === ""){
                document.getElementById("cfmPasswordMsg").innerHTML = "* This field cannot be left blank!";
                $("#cfmPasswordMsg").removeClass('hidden');
                $("#signupForm.accForm").css("paddingTop","15%");
            }
            if (username  !== ""){
                if (userExist === true){
                    document.getElementById("usernameMsg").innerHTML = "* Username already exists!";
                    $("#usernameMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");
                
                }
                else if (userLen === false){
                    document.getElementById("usernameMsg").innerHTML = "* Username must be between 8 and 32 characters!";
                    $("#usernameMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");
                
                }               
            }
            if (password !== ""){
                if (passFormat === false && passwordLen === false){
                    document.getElementById("passwordMsg").innerHTML = "* Password must be between 8 and 32 characters and contain at least an uppercase and a symbol!";
                    $("#passwordMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");

                }
                else if (passwordLen === false){
                    document.getElementById("passwordMsg").innerHTML = "* Password must be between 8 and 32 characters!";
                    $("#passwordMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");

                }
                else if (passFormat === false){
                     document.getElementById("passwordMsg").innerHTML = "* Password must contain at least an uppercase and a symbol!";
                     $("#passwordMsg").removeClass('hidden');
                     $("#signupForm.accForm").css("paddingTop","15%");
                    
                }
            }
            if (cfmPassword !== ""){
                if (samePassword === false){
                    document.getElementById("cfmPasswordMsg").innerHTML = "* Password does not match!";
                    $("#cfmPasswordMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");

                }
            }
              if (emailAddress !== ""){
                if (emailFormat === false){
                    document.getElementById("emailAddressMsg").innerHTML = "* Invalid email address!";
                    $("#emailAddressMsg").removeClass('hidden');
                    $("#signupForm.accForm").css("paddingTop","15%");

                }
            }
        }
        
    </script>
    

    <!-- Own Javascripts-->
    <script type="text/javascript" src="js/homepage.js" ></script>
    <script type="text/javascript" src="js/accountPage.js" ></script>
    <script type="text/javascript" src="js/textSearch.js" ></script>  
    <script type="text/javascript" src="js/selectPicker.js" ></script>  

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxQ7lliS6ezntafINPqT-UN2f5b8FrOwI&libraries=places&region=sg&callback=searchAutoComplete" async defer></script>
</body>
</html>