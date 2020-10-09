<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['check']);
header('location:login.php');
?>