<?php
include_once('../../db/db_config.php');
$ob=new db_config;
if(isset($_POST['add_ticker']))
{
	$ticker_title=$_POST['ticker_title'];
	$news_id=$_POST['news_id'];
	$sql_add="INSERT INTO `ticker`(`ticker_title`, `refer_news_id`) VALUES ('$ticker_title',$news_id)";
	$result_add=mysqli_query($ob->config(),$sql_add);
	if($result_add)
		header('location:../ticker.php');
}
?>