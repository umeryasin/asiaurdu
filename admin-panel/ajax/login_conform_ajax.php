<?php
	include_once('../../db/db_config.php');
	$ob=new db_config;
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM `admin_login` WHERE email='$email' AND password='$pass'";
	$result=mysqli_query($ob->config(),$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0)
	{
		session_start();
			$_SESSION['userid']=$row['admin_id'];
			$_SESSION['email']=$email;
			$_SESSION['check']=true;
			echo "logedin";
	}
	else
	{
		echo "notloged";
	}

?>