<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
if(isset($_POST['update_ticker']))
{
	$ticker_id=$_POST['ticker_id'];
	$ticker_title=$_POST['ticker_title'];
	$news_id=$_POST['news_id'];
	$sql_up="UPDATE `ticker` SET `ticker_title`='$ticker_title',`refer_news_id`=$news_id WHERE ticker_id=$ticker_id";
	//echo $sql_up;
	$result_up=mysqli_query($ob->config(),$sql_up);
	if($result_up)
		header('location:../ticker.php');
}
?>