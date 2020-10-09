<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$del_id=$_POST['del_id'];
$sql="DELETE FROM `youtube_videos` WHERE `yv_id`=$del_id";
$result=mysqli_query($ob->config(),$sql);
if($result)
{
	echo true;
}
?>