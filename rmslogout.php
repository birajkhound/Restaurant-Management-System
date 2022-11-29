<?php
$_SESSION['timeout']=time();
session_start();
session_destroy();
header("location:adminlogin.php");
echo "hellow";
?>