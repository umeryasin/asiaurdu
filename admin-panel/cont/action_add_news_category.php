<?php
include_once('../../db/db_config.php');
$ob=new db_config;

if(isset($_POST['save']))
{
	$cate_name=$_POST['cate_name'];
	$permalink=$_POST['permalink'];
	$sql="INSERT INTO `news_categories`(`news_categories`,`permalink`) VALUES ('$cate_name','$permalink')";
	$result=mysqli_query($ob->config(),$sql);
	if($result)
		header('location:../news-categories.php');
}
?>