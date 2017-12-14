<?php
error_reporting(0);
session_start();
$suc=$_GET['success'];
if(!isset($_SESSION['uid']))
		{
			header("location:registration.php");
			die();
		}
?>
<html>
	<head>
		<script src="js/val.js"></script>
		<link href="css/layout.css" rel="stylesheet" type="text/css">
		<link href="css/boot.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php if($suc=="true"){
		echo'<div class="alert alert-success">
  			<strong>Success!</strong> Your Question has been posted.
			</div>';
		}
			if($suc=="false"){
				echo'<div class="alert alert-danger">
  					<strong>Error!!!</strong> Check The fields For Error.
					</div>';
			}
		?>
	<div class="container">
		<?php include("include/header.php");?>
		<div class="body1">
			<form action="" method="post" id="buttons">
			<button type="submit" name="addq">ADD QUESTION</button>
			<button type="submit" name="solq">SOLVE QUESTIONS</button>
			</form>
			<?php if(isset($_POST['addq']))
				{include("post.php");}
			if(isset($_POST['solq']))
				{header("location:gen.php");}?>
		</div>
		<?php include("include/footer.php");?>
	</div>
	</body>