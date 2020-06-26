<?php
include '../assets/php/catover203-function.php';
include 'connection.php';
$connect = mysqli_connect($host, $dbuser, $dbpass, $db);
if(isset($_POST['submit'])){
$userName = ($_POST['Username']);
$psw = ($_POST['password']);
$rpass = ($_POST['repass']);
$epass = base64_encode($psw);
$sqlcheck = "SELECT ID FROM accounts WHERE UserName = '".$userName."'";
$querycheck = mysqli_query($connect, $sqlcheck);
$check = mysqli_num_rows($querycheck);
$nac = '<' OR '>';
$string_check = string_check($userName, $nac);
if($userName != "" && $psw != "" && $check !='1' && $string_check = false && $psw=$rpass){
$sql1 = "INSERT INTO accounts (UserName, Password) VALUES ('".$userName."', '".$epass."')";
$query1 = mysqli_query($connect, $sql1);
echo '<h1>SUCCESS</h1><br><p>Redirecting to login, if they not redirect (<a href="login.php">Click here</a>)</p>';
header ('Location: login.php');
}else{
echo "<body style='background-color:lightblue'><h1>Failed</h1><br><p>You can't empty UserNames or Password or UserName have been taken or contain not allowed character '<' and '>' or password not match, <a href=''>Try again</a></p>";
}
}else{
echo '
<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Register</title>
</head>
<body style="background-color:lightblue">
<h1>Register</h1>
<script> function showpass() { var input = document.getElementById("password"); if (input.type === "password"){ input.type = "text"; }else{ input.type = "password"; } } </script>
<script> function showrepass() { var input = document.getElementById("repass"); if (input.type === "password"){ input.type = "text"; }else{ input.type = "password"; } } </script>
<form action="" method="post">
<label for="Username">User name: </label>
<input type="text" name="Username" required><br>
<label for="password">Password: </label>
<input type="password" name="password" id="password" required>
<input type="checkbox" onclick="showpass()">Show<br>
<label for="repass">Repeat password</>
<input type="password" name="repass" id="repass" reqired>
<input type="checkbox" onclick="showrepass()">Show<br>
<input type="submit" value="Create account" name="submit">
</form>
<p>If you aready have accounts, <a href="login.php">login</a>.</p>
</body>
</catht>';
}
?>