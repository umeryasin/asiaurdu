<?php
include_once('../../db/db_config.php');
$ob=new db_config;
$edit_id=$_POST['edit_id'];
//
$sql_data="SELECT * FROM `news_categories` WHERE `news_categories_id`=$edit_id";
$result_data=mysqli_query($ob->config(),$sql_data);
$row_data=mysqli_fetch_assoc($result_data);
echo $row_data['news_categories'].",".$row_data['permalink'];
?>