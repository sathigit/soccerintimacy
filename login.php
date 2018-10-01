<?php
require_once 'admin/includes/connection.php';

$username = $_POST["username"];
$pass = $_POST["pass"];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$check    = "SELECT * FROM `register` WHERE `email`='$username' AND `password` = '$pass' AND `status` = '1'";
$result   = $Q($link,$check);
$count    = $C($result);

if($count>0)
	{
      $row_admin           = $F($result);
	  $_SESSION['adminid'] = $row_admin['id'];
	  sleep(3);
	  echo "<script>window.location='index.php';</script>";
}else{echo "Username or password doesn't match, Please try again";}


?>