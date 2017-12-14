<?php
session_start();
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	if(isset($_POST['submit']))
	{
		include'include/dbconnect.php';
		$uid = mysqli_real_escape_string($conn , $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn , $_POST['pwd']);
		if(empty($uid) || empty($pwd))
		{
			header("location:registration.php#login?err=loginemp");
		}
		else{
			$sql = "SELECT * FROM user WHERE user_uid='$uid'";
			$result = mysqli_query($conn,$sql);
			$resultcheck = mysqli_num_rows($result);
			if($resultcheck<1)
			{
				header("location:registration.php#login?err=loginchk");
				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($result)){
					$verify = password_verify($pwd , $row['user_pwd']);
					if(!$verify)
					{
						header("location:registration.php$login?err=loginvrf");
					}
					else{
						$_SESSION['uid']=$row['user_uid'];
						$_SESSION['fname']=$row['user_fname'];
						$_SESSION['lname']=$row['user_lname'];
						$_SESSION['email']=$row['user_email'];
						header("location:index.php");
					}
				}
			}
		}
	}
?>