<?php 
session_start();
$link = mysqli_connect('localhost','root','','db03_3');
mysqli_query($link,"SET NAMES UTF8");
$strtime = strtotime("+6hour");
$nowday  = date("Y-m-d",$strtime);
$nowtime  = date("Y-m-d H:i:s",$strtime);


?>