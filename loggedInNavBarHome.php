<link href="css/loggedIn.css" rel="stylesheet" type="text/css"/>
  
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="homepage.php"><img src="images/logo.png" alt="" class="logo"/></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="homepage.php">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right userAcc">
            <li class="dropdown"><a class="dropdown-toggle username" data-toggle="dropdown" href="#"><?php echo  $_SESSION['username'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="searchHist.php" class="accSelection">View Search History</a></li>
                    <li><a href="logout.php" class="accSelection logout">Logout</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </nav>