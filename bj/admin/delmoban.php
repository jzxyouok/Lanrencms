﻿<?php
@session_start();  
//检测是否登录，若没登录则转向登录界面  
if(!isset($_SESSION['ewema=1330407081'])){  
    header("Location:login.html");  
    exit();  
} 
header("Content-type: text/html; charset=utf-8"); 
require_once('../conn.php');
$mbid=$_GET['mbid'];
if($mbid<>""){
	$sql="delete from moban where mbid=".$mbid;
	$ret=mysql_query($sql,$link);
	if ($ret===false) {
	die("faile:".mysql_error($link));
	} else {
	echo "<script>alert('删除成功！');window.history.back(-1);</script>";
	}
	mysql_close($link);
}
?>
