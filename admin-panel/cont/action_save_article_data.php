<?php

include_once('../../db/db_config.php');

$ob=new db_config();

include_once('../secure.php');

if(isset($_POST['save']))

{

	$article_title=$_POST['article_title'];

	$article_permalink=$_POST['article_permalink'];

	$article_category=$_POST['article_category'];

	$article_content=$_POST['article_content'];

	date_default_timezone_set("Asia/Karachi");

	$article_date=date("Y/m/d");

    $t=time();

	$article_time=date("G:i:s",$t);

	$article_user_id=$_SESSION['userid'];



	//$article_image=addslashes(file_get_contents($_FILES["article_image"]["tmp_name"]));

	$article_image = $_FILES['article_image']['name'];

	$target = "../../upload/article/".basename($article_image);

	move_uploaded_file($_FILES['article_image']['tmp_name'], $target);

	//

	$sql="INSERT INTO `news_article`(`article_title`, `aricle_permalink`, `article_category_id`, `article_image`, `article_content`, `aricle_date`, `article_user`, `article_views`, `article_time`) VALUES ('$article_title','$article_permalink','$article_category','$article_image','$article_content','$article_date',$article_user_id,0,'$article_time')";

	$result=mysqli_query($ob->config(),$sql);

	if($result)

		header('location:../news-article.php');

}

?>