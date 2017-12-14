<?php
session_start();
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!isset($_SESSION['uid'])){
	header("location:registration.php?err=login");
	die();
}
if(isset($_POST['submit'])){
	include'dbconnect.php';
	$class = mysqli_real_escape_string($conn,$_POST['classm']);
	$sub = mysqli_real_escape_string($conn,$_POST['Subject']);
	$type = mysqli_real_escape_string($conn,$_POST['typeofq']);
	$qstn = mysqli_real_escape_string($conn,$_POST['question']);
	$dtime = mysqli_real_escape_string($conn,$_POST['datetime']);
	$uid = mysqli_real_escape_string($conn,$_SESSION['uid']);
	$meta = mysqli_real_escape_string($conn,$_POST['qmeta']);
	if(empty($type) || empty($qstn) || empty($dtime) || empty($uid) || empty($meta) || empty($class) || empty($sub) )
	{
		header("location:../index.php?success=false");
		die();
	}
	else{
		$sql = "INSERT INTO qdb(q_type,q_con,q_dtime,uid,q_meta,class,sub) VALUES ('$type','$qstn','$dtime','$uid','$meta','$class','$sub');";
		$status = mysqli_query($conn , $sql);
		if(!$status)
		{
		header("location:../index.php?success=false");
			
			die();
		}
		else{
			header("location:../index.php?success=true");
		}
	}
}
else{
	die();
}
?>