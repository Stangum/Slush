<?php
	include_once("../common/dbconnect.php");
	echo"connected";
	if(isset($_POST['use_uid']))
	{
 		$uid=$_POST['user_uid'];

 		$checkdata=" SELECT * FROM user WHERE user_uid='$uid' ";

 		$query=mysqli_query($conn,$checkdata);

 		if(mysqli_num_rows($query)>0)
 		{
  			echo "Username Already Exist";
		}
 		else
 		{
 			 echo "OK";
 		}
 		exit();
	}
?>