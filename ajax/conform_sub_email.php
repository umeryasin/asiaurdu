<?php
include('../db/db_config.php');
$ob=new db_config();
$email=$_POST['email'];
$sql_in="INSERT INTO `sub_email`(`sub_email`) VALUES ('$email')";
$result_in=mysqli_query($ob->config(),$sql_in);
if($result_in)
	echo true;
?>