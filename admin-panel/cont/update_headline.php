<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
//
$edit_id=$_POST['edit_id'];
$title=$_POST['title'];
$description=$_POST['description'];
$refer_id=$_POST['refer_id'];
$text_color=$_POST['text_color'];
//
// No file was selected for upload, your (re)action goes here
$sql_up="UPDATE `headlines` SET `headline_title`='$title',`headline_description`='$description',`headline_refer_news_id`=$refer_id,`headline_text_color`='$text_color' WHERE `headline_id`=$edit_id";
$result_up=mysqli_query($ob->config(),$sql_up);
if($result_up)
{
	//echo "Yes";
}
//
if (empty($_FILES['image']['name']))
{
	//echo "image not found";    
}
else
{
	$image=$_FILES['image']['name'];
	$target = "../../upload/headline/".basename($image);
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	//
	$sql_img="UPDATE `headlines` SET `headline_image`='$image' WHERE `headline_id`=$edit_id";
	$result_img=mysqli_query($ob->config(),$sql_img);
}
header('location:../headlines.php');
?>