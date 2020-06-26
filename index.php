<?php
session_start();
$imgtype = ".jpg" OR ".gif" OR ".jpeg" OR ".png";
$uas = "assets/images/user/".$_SESSION["ID"].$imgtype;
$uavt = 'assets/images/logo.png';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta name="google-site-verification" content="kGwt_16ltqQ5nDfXH9dCgUy7YZYtLqABNKF8gVupOL4" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catboom - Catover203 Search</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <a href="accounts/accounts.php"><img src="<?php if(file_exists($uas)){ echo $uas; }else{ echo $uavt; } ?>" align="right" height="50" width="50" class="useravt"></a>
    <div class="wrapper indexPage">
        <div class="mainSection">
            <div class="logoContainer">
                <img src="assets/images/logo.png" alt="Google Title">
            </div>
            <div class="searchContainer">
                <form action="search.php" method="get">
                    <input type="text" class="searchBox" name="term">
                    <input type="submit" class="searchButton" value="Search">
                </form>
            </div>
        </div>
    </div>
</body>
</html>