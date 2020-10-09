<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$del_id=$_POST['del_id'];
$sql="DELETE FROM `ticker` WHERE ticker_id=$del_id";
$result=mysqli_query($ob->config(),$sql);
if($result)
	echo "Deleted";
?>