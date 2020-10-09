<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
if(isset($_POST['update']))
{
	$article_id=$_POST['article_iid'];
	$article_title=$_POST['article_title'];
	$article_permalink=$_POST['article_permalink'];
	$article_category=$_POST['article_category'];
	$article_content=$_POST['article_content'];
	$sql_up="UPDATE `news_article` SET `article_title`='$article_title',`aricle_permalink`='$article_permalink',`article_category_id`=$article_category,`article_content`='$article_content' WHERE article_id=$article_id";
	//echo $sql_up;
	$result_up=mysqli_query($ob->config(),$sql_up);
	if($result_up)
		header('location:../view-news-article.php');
}

?>