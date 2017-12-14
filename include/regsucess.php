<head>
<style>
body{
	background-color: #2c3e50;
}
#container{
	margin-left: 10%;
	margin-right: 10%;
	margin-top:5%;
	background-color: #bdc3c7;
	border: 2px;
	border-radius:10px;
}
h1{
	color:#27ae60;
	font-family:'Roboto', sans-serif;
	font-size:30px;
	font-weight:bolder;
	padding-top:2%;
	text-align:center;
}
p{
	color:#7f8c8d;
	font-family:'Roboto', sans-serif;
	font-size:16px;
	text-align:center;
	padding:2%;
	
}
</style>
	<title>
		Registration Sucessful
	</title>
</head>
<body>
	<div id="container">
		<h1>Registration Sucessful</h1>
		<p>A Confirmation Email Has Been Sent to Your Email Address :<?php $email=$_GET["email"]; echo $email; ?> Please Visit Your Email For Confirmation</p>
	</div>
</body>