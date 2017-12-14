<?php
	$system = "localhost";
	$usr = "root";
	$pwd = "";
	$db = "slush";

	$conn = mysqli_connect($system,$usr,$pwd,$db);
	if(isset($_POST['user_email']))
	{
 		$emailId=$_POST['user_email'];

 		$checkdata=" SELECT email FROM user WHERE email='$emailId' ";

 		$query=mysqli_query($conn,$checkdata);

 		if(mysqli_num_rows($query)>0)
 		{
  			echo "Email Already Exist";
		}
 		else
 		{
 			 echo "OK";
 		}
 		exit();
	}
?>