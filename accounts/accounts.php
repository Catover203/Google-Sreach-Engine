<?php
session_start();
include '../assets/php/catover203-function.php';
include 'connection.php';
$connect = mysqli_connect($host, $dbuser, $dbpass, $db);
$UserID = ($_SESSION['ID']);
$tquery = "SELECT roleID FROM urole WHERE UserID = '".$UserID."'";
$tdo = mysqli_query($connect, $tquery);
$tfetch = mysqli_fetch_assoc($tdo);
$tID = $tfetch['roleID'];
$nquery = "SELECT * FROM role WHERE ID = '".$tID."'";
$ndo = mysqli_query($connect, $nquery);
$nfetch = mysqli_fetch_assoc($ndo);
$UserColor = $nfetch['Color'];
$ModLevel = $nfetch['roleLevels'];
$UserRole = $nfetch['roleName'];
$UpdateClick = $nfetch['uc'];
if($UpdateClick == 1){
$more = "<p style='color:yellow'>Add Click</p>
<from action='' method='post'>
<label for='url'>URL: </label>
<input type='url' name='url'><br>
<label for='time'>Click: </label>
<input type='number' name='time'><br>
<input type='submit' value='Update'>
</form>";
}else{
$more = "";
}
$sqlunnn = "SELECT * FROM accounts WHERE ID = ".$UserID;
$snnquery = mysqli_query($connect, $sqlunnn);
$aui = mysqli_fetch_assoc($snnquery);
$UserName = $aui['UserName'];
if(isset($_GET['logout'])){
session_destroy();
header ('Location: ../index.php');
}
if(!isset($_SESSION['ID'])){
exit ("<p>Please, <a href='login.php'>login</a></p>");
}else{
if($ModLevel == 2){
$Ml = "Elder Moderator";
}
if($ModLevel == 1){
$Ml = "Moderator";
}
if($ModLevel == 3){
$Ml = "Adminstrator";
}
if($ModLevel == 0){
$Ml = "Member";
}
if($ModLevel > 4 OR $ModLevel < 0){
$Ml = "Unknown";
}
if(!isset($UserRole)){
$UserRole = "None";
}
if(isset($_POST['cnpass'])){
$epass = base64_encode($_POST['cnpass']);
$changepass = "UPDATE accounts SET Password = '".$epass."' WHERE ID = '".$UserID."'";
$do = mysqli_query($connect, $changepass);
exit ('<!DOCTYPE catdata>
<catht>
<head>
<title>Change Password</title>
</head>
<body style="background-color:lightblue">
<h1>Successful</h1>
<br>
<p>Password changed, <a href="">go back</a>.</p>
</body>
</catht>'); 
}
if(isset($_POST['url'])){
$url = ($_POST['url']);
$time = ($_POST['time']);
$do = catdb_query($connect, "UPDATE sites SET clicks = '".$time."' WHERE url = '".$url."'");
echo ('<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Role Permisson - Update Click</title>
</head>
<body>
<h1>Success</h1>
<br>
<p>Update success, <a href="">go back</a></p>
</body>
</catht>');
}
if(isset($_POST['cnun'])){
$string_check = string_check($_POST['cnun'], '<' or '>');
$ce = mysqli_query($connect, "SELECT FROM accounts WHERE UserName = '".$POST['cnun']."'");
$ext = mysqli_num_rows($ce);
if($ext == 0 && $string_check = false){
$changeuser = "UPDATE accounts SET UserName = '".$_POST['cnun']."' WHERE ID = '".$UserID."'";
$did = mysqli_query($connect, $changeuser);
echo ('<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Change UserNames - Success</title>
</head>
<body style="background-color:lightblue">
<h1>Successful</h1>
<br>
<p>UserName Changed, <a href="">go back</a>.</p>
</body>
</catht>'); 
}else{
echo '<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Change UserName - Failed</>
</head>
<body style="background-color:lightblue">
<h1>Failed</>
<br>
<p>Failed, 
<a href="">go back
</a>
.</p>
</body>
</catht>';
}
}
echo ('
<!DOCTYPE cathtml>
<catht>
<head>
<title>Account - CatBOOM</title>
<link rel="stylesheet" src="../asset/css/style.css">
<style>
.userColor{
color:'.$UserColor.'
}
</style>
</head>
<body style="background-color:lightblue">
<h1 style="font-size:300%">Account Mangenment</h1>
<p style="font-size:200%">Welcome <a class="userColor">'.$UserName.'</a> , UserID: <a style="color:red">'.$UserID.'</a></p>
<p style="font-size:160%; color:yellow">Role: <a class="userColor">'.$UserRole.'</a></p>
<p style="font-size:150%; color:yellow">Role type: <a class="userColor">'.$Ml.'</a></p>
<br>
<a href="../index.php" style="color:green; font-size:180%">Home</a>
<p style="font-size:150%">Change Password</p>
<form action="" method=post>
<input type="password" name="cnpass" id="cnpass" required>
<input type="checkbox" onclick="showpass()">Show password
<br>
<input type="submit" value="Change">
</form>
<script>
function showpass() {
var input = document.getElementById("cnpass");
if (input.type === "password"){
input.type = "text";
}else{
input.type = "password";
}
}
</script>
<br>
<p style="font-size:150%">Change UserName</p>
<form action="" method="post">
<input type="text" name="cnun" required>
<input type="submit" value="Change">
</form>
<a href="?logout=1">Logout</a>
<a href="upload-img.php">Change User Avatar</a>
</body>
</catht>
'.$more); }
?>