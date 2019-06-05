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

        <ul class="nav navbar-nav navbar-right">
            <li><input name="accountSelection" type= button id='loginBtn' class="headerBtn" onclick="location.href = 'loginPage.php'" value="Login">
            <li><input name="accountSelection" type= button  id='signupBtn' class="headerBtn" onclick="location.href = 'signUpPage.php'" value="Sign Up">
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
<script type="text/javascript" src="js/textSearch.js" ></script>
