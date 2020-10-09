<?php
include_once('../../db/db_config.php');
$ob=new db_config();
include_once('../secure.php');
if(isset($_POST['update']))
{
	$userid=$_POST['userid'];
	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['admin_email'];
	$admin_password=$_POST['admin_password'];
	$admin_url=$_POST['admin_url'];
	$admin_bio=$_POST['admin_bio'];
	$admin_pic=addslashes(file_get_contents($_FILES["admin_pic"]["tmp_name"]));
	$sql="UPDATE `admin_login` SET `name`='$admin_name',`email`='$admin_email',`password`='$admin_password',`admin_profile_pic`='$admin_pic',`admin_bio`='$admin_bio',`admin_url`='$admin_url' WHERE admin_id=$userid";
	$result=mysqli_query($ob->config(),$sql);
	if($result)
		header('location:../profile.php');
}
?>