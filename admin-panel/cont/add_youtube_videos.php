<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
//
$user_id=$_SESSION['userid'];
$date=date("Y/m/d");
$t=time();
$time=date("G:i:s",$t);
//
$youtube_video_title=$_POST['youtube_video_title'];
$youtube_video_code=$_POST['youtube_video_code'];

$sql_ins="INSERT INTO `youtube_videos`(`yv_video_title`, `yv_video_code`, `yv_user_id`, `yv_date`, `yv_time`, `yv_views`) VALUES ('$youtube_video_title','$youtube_video_code',$user_id,'$date','$time',0)";
$result_ins=mysqli_query($ob->config(),$sql_ins);
if($result_ins)
{
	header("location:../youtube-videos.php");
}
?>