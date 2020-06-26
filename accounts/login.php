<?php
include '../assets/php/catover203-function.php';
include 'connection.php';
$connect = mysqli_connect($host, $dbuser, $dbpass, $db);
if(isset($_POST['submit'])){
$userName = ($_POST['Username']);
$psw = ($_POST['password']);
$epass = base64_encode($psw);
$sql1 = "SELECT ID, UserName FROM accounts WHERE UserName = '".$userName."' AND Password = '".$epass."'";
$query1 = mysqli_query($connect, $sql1);
$udata = mysqli_fetch_assoc($query1);
$countrow = mysqli_num_rows($query1);
$sql3 = "SELECT * FROM urole WHERE UserID = '".$udata['ID']."'";
$query3 = mysqli_query($connect, $sql3);
$rolecount = mysqli_num_rows($query3);
if($rolecount == '0'){
$sql2 = "INSET INTO urole (roleID, UserID) VALUES ('2', '".$udata['ID']."')";
$query2 = mysqli_query($connect, $sql2);
}
if($countrow == '1'){
echo '<h1>SUCCESS</h1><br><p>redirecting</p>';
header ('Location: accounts.php');
session_start();
$_SESSION['UserName'] = $udata['UserName'];
$_SESSION['ID'] = $udata['ID'];
}else{
echo '<h1>Failed</h1><br><p>failed data not found, <a href="">Try Again</a>.</p>';
}
}else{
echo '
<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Login</title>
<catdata encode="true" auto-redir="afterlogin">
</head>
<body style="background-color:lightblue">
<script> function showpass() { var input = document.getElementById("pass"); if (input.type === "password"){ input.type = "text"; }else{ input.type = "password"; } } </script>
<h1>Login</h1>
<form action="" method="post" name="submit">
<label for="Username">User Name: </label>
<input type="text" name="Username"><br>
<label for="password">Password: </label>
<input type="password" name="password" id="pass">
<input type="checkbox" onclick="showpass()">Show password<br>
<input type="submit" value="login" name="submit">
</form>
<p>If you not have accounts, <a href="register.php">Create accounts</a>.</p>
</body>
</catht>';
}
?>