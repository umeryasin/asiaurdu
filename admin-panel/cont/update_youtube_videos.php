<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
//
$edit_id=$_POST['edit_id'];
$youtube_video_title=$_POST['youtube_video_title'];
$youtube_video_code=$_POST['youtube_video_code'];
//
$update="UPDATE `youtube_videos` SET `yv_video_title`='$youtube_video_title',`yv_video_code`='$youtube_video_code' WHERE `yv_id`=$edit_id";
$result_update=mysqli_query($ob->config(),$update);
if($result_update)
	header("location:../youtube-videos.php");
?>