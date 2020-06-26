<?php
include '../assets/php/catover203-function.php';
session_start();
if(!isset($_SESSION['ID'])){
    header ('Location: login.php');
}
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../assets/images/user/".$_SESSION['ID'].".".$file_ext);
         echo "<h1>Success</h1>";
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE catdata>
<html>
<head>
    <title>CatBOOM - upload avt</title>
</head>
   <body style="background-color:lightblue">
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" value="Upload"/>
      </form>
      
   </body>
</html>
