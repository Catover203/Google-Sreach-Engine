<?php
sesion_start();
if(!isset($_SESSION['ID'])){
echo "Sorry you need <a href='accounts/login.php'>Login</a> Fist";
}
$imgtype = ".jpg" OR ".gif" OR ".jpeg" OR ".png";
$uas = "assets/images/user/".$_SESSION["ID"].$imgtype;
$uavt = 'assets/images/logo.png';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Console Submit Url</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/catboom.min.js"></script>
</head>
<body>
       <a href="accounts/accounts.php"><img src="<?php if(file_exists($uas)){ echo $uas; }else{ echo $uavt; } ?>" align="right" height="50" width="50" class="useravt"></a>
<div class="wrapper indexPage">
    <div class="mainSection">
        <div class="logoContainer">
            <img src="assets/images/logo.png" alt="Search Console Submit Url">
        </div>
        <div class="searchContainer">
            <form method="post" id="formSubmitUrl">
                <input type="url" class="searchBox" name="url" placeholder="Enter url" required>
                <label class="textGradient"></label>
                <input type="submit" class="searchButton" id="buttonSubmit"  value="Submit">
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#formSubmitUrl").submit(function (e) {
            e.preventDefault();
            $( ".textGradient" ).text( "Processing Please wait..." );
            $("#buttonSubmit").prop('disabled', true);
            $.ajax({
                type: 'post',
                url: 'crawl.php',
                data: $('form').serialize(),
                success: function () {
                    $("#buttonSubmit").text('disabled', false);
                    $( ".textGradient" ).html( "The system has received the url" );
                }
            });
        })
    })
</script>
</body>
</html>
