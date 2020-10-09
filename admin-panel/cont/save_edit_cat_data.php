<?php
include_once('../../db/db_config.php');
$ob=new db_config;
$cat_edit_id=$_POST['cat_edit_id'];
$cate_name_edit=$_POST['cate_name_edit'];
$permalink_edit=$_POST['permalink_edit'];
//
$sql_up="UPDATE `news_categories` SET `news_categories`='$cate_name_edit',`permalink`='$permalink_edit' WHERE `news_categories_id`=$cat_edit_id";
$result_up=mysqli_query($ob->config(),$sql_up);
if($result_up)
{
	header('location:../news-categories.php?msg=Success');
}
else
{
	header('location:../news-categories.php?msg=Failed');
}
?>