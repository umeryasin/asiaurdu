<?php
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$email."\n".$name."\n".$_POST['message'];
mail("asiaurdu1@gmail.com", $subject, $message);
if(mail)
echo true;
?>