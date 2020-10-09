<?php
include_once('../../db/db_config.php');
$ob=new db_config;
if(isset($_POST['chnage_imgage']))
{
	$article_id=$_POST['article_id'];

	//$article_image=addslashes(file_get_contents($_FILES["img_change"]["tmp_name"]));
	$article_image = $_FILES['img_change']['name'];
	$target = "../../upload/article/".basename($article_image);
	move_uploaded_file($_FILES['img_change']['tmp_name'], $target);
	//
	$sql_update_img="UPDATE `news_article` SET `article_image`='$article_image' WHERE article_id=$article_id";
	$result_update_img=mysqli_query($ob->config(),$sql_update_img);
	if($result_update_img)
		header('location:../view-news-article.php');
}
?>