<?php
include "accounts/connection.php";
//go to accounts/connection.php to edit
ob_start();

try {

    $con = new PDO($db.";".$host, $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (PDOException $e){
    echo "Connection failed:" . $e->getMessage();
}