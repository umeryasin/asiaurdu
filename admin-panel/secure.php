<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['userid']) && $_SESSION['check']==true)
  $_SESSION['loged']=date('Y/m/d');
else
  header('location:login.php');
?>