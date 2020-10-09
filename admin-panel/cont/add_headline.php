<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
if(isset($_POST['add_headline']))
{
	$title=$_POST['title'];
	$description=$_POST['description'];
	//
	$image=$_FILES['image']['name'];
	$target = "../../upload/headline/".basename($image);
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	//
	$refer_id=$_POST['refer_id'];
	$text_color=$_POST['text_color'];
	//

	date_default_timezone_set("Asia/Karachi");
	$article_date=date("Y/m/d");
    $t=time();
	$article_time=date("G:i:s",$t);
	//
	$sql_headline="INSERT INTO `headlines`(`headline_title`, `headline_description`, `headline_image`, `headline_refer_news_id`, `headline_date`, `headline_time`, `headline_text_color`) VALUES ('$title','$description','$image',$refer_id,'$article_date','$article_time','$text_color')";
	$result_headline=mysqli_query($ob->config(),$sql_headline);
	if($result_headline)
	{
		header('location:../headlines.php');
	}
}
?>