<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(isset($_POST["submit"])){
	include_once'include/dbconnect.php';
	$fname = mysqli_real_escape_string($conn,$_POST['idxf-name']);
	$lname = mysqli_real_escape_string($conn,$_POST['idxl-name']);
	$pwd = mysqli_real_escape_string($conn,$_POST['idx-pwd']);
	$email = mysqli_real_escape_string($conn,$_POST['emailid']);
	$cpwd = mysqli_real_escape_string($conn,$_POST['idxc-pwd']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$fname=ucfirst(strtolower($fname));
	$lname=ucfirst(strtolower($lname));

	if(empty($fname)||empty($lname)||empty($pwd)||empty($cpwd)||empty($email)||empty($uid))
	{
		header("location:common/regfail.php");
		exit();
	}
	else{
		if(!preg_match('/^[a-zA-Z]*$/', $fname) || !preg_match('/^[a-zA-Z]*$/', $lname)){
			header("location:common/regfail.php");
			exit();
		}
		else{
			if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
				header("location:common/regfail.php");
				exit();
			}
			else{
				$sql = "SELECT * FROM user WHERE user_uid='$uid' or user_email='$email'";
				$result = mysqli_query($conn,$sql);
				$resultcheck = mysqli_num_rows($result);
				if($resultcheck>0){
					header("location:common/regfail.php");
					exit();	
				}
				else{
					if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$pwd))
					{
						header("location:common/regfail.php");
						exit();
					}
					else{
						if($pwd == $cpwd)
						{
							$hashedpwd= password_hash($pwd , PASSWORD_DEFAULT);
							$sql = "INSERT INTO user (user_fname,user_lname,user_uid,user_pwd,user_email) VALUES ('$fname','$lname','$uid','$hashedpwd','$email');";
							$result = mysqli_query($conn , $sql);
							if(!$result)
							{
								header("location:common/regfail.php");
								exit();
							}
							else{
								header("location:common/regsucess.php");
							}
						}
						else{
							header("location:common/regfail.php");
							exit();
						}
					}
				}
			}
		}
	}
}
?>