<link href="css/loggedIn.css" rel="stylesheet" type="text/css"/>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="homepage.php"><img src="images/logo.png" alt="" class="logo"/></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="homepage.php">Home</a></li>
        </ul>
        <div class="nav navbar-nav accSearchArea">
            <form class="searchForm" method="get" action="queryManager.php">
                <input type="text" placeholder="Enter your search here..." onclick="addName()" class="accSearchBar" id="searchInput">
                <div class="selectDiv">
                    <select class="selectpicker" data-style="btn-primary" id='searchOption'>
                        <option disabled selected value style="display:none">Search by...</option>
                        <option value="locationSearch">Location</option>
                        <option value="eaterySearch">Eatery</option>
                    </select>
                </div>
                <button type="submit" onclick="redirectResults()" class='submitBtn searchBarBtn'><img src="images/whiteSearch.png" alt="" class='searchLogo navbarSearch'/></button>
            </form>
        </div>

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
<script>
    function addName() {
        var theInput = document.getElementById('searchInput');
        $('#searchOption').change(function () {
            var selectedText = $(this).find("option:selected").val();
            theInput.name = selectedText;
        });
    }

    function redirectResults() {
        addName();
        window.location.href = "queryManager.php";
    }
   
</script>