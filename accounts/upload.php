<?php
include 'connection.php';
if(!isset($_SESSION['UserName'], $_SESSION['ID'])){
echo '<h1>Sorry you need login fist<h1>';
header ('Location: login.php');
}else{
if(isset($_FILE['images'])){
$error = array();
$file_name = $_FILE['images']['name'];
$file_tmp =$_FILES['images']['tmp_name'];
$file_ext=strtolower(end(explode('.',$_FILES['images']['name'])));
$extensions= array("jpeg","jpg","png","gif");
if(in_array($file_ext,$extensions)=== false){
$error[] = 'Only jpeg, jpg, gif, png allowed';
}
if(empty($error) == true){
move_uploaded_file($file_tmp, "../asset/user/".$_SESSION['ID'].".".$file_ext);
echo "SUCCESS";
header ('Location: accounts.php');
}else{
echo 'Failed, <a href="">Try again</a>';
}
}
}
?>
<!DOCTYPE catdata>
<catht>
<head>
<title>CatBOOM - Upload Avatar</title>
</head>
<body style="background-color:lightblue">
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="images">
<input type="submit" value="Upload Images">
</form>
</body>
</catht>