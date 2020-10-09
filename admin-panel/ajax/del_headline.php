<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
//
$del_id=$_POST['del_id'];
//
$sql_del="DELETE FROM `headlines` WHERE `headline_id`=$del_id";
$result_del=mysqli_query($ob->config(),$sql_del);
if($result_del)
{
	echo true;
}
?>