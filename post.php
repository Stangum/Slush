<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
if(!isset($_SESSION['uid'])){
	header("location:registration.php?err=login");
}
?>
<body>
<div id="headtitle">ADD QUESTION +</div>
<form action="include/postq.php" method="post">

	 	<div id="qtitle">Class:</div>
	 	<div id = "dropdown">
	 	<select name="classm" required>
    	<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3" selected>3</option>
    	<option value="4">4</option>
    	<option value="5">5</option>
    	<option value="6">6</option>
    	<option value="7">7</option>
    	<option value="8">8</option>
    	<option value="9">9</option>
    	<option value="10">10</option>
  		</select></div>
  		<div id="qtitle">Subject:</div>
	 	<div id = "dropdown">
	 	<select name="Subject" required>
    	<option value="EnglishI">English I</option>
    	<option value="EnglishII">English II</option>
    	<option value="HindiI"  >Hindi I</option>
    	<option value="HindiII">Hindi II</option>	
    	<option value="Maths" selected>Maths</option>
    	<option value="Biology">Biology</option>
    	<option value="Physics">Physics</option>
    	<option value="Chemistry">Chemistry</option>
    	<option value="History">History</option>
    	<option value="Geography">Geography</option>
    	<option value="Coumputer Scrience">Coumputer Scrience</option>
    	<option value="Economics">Economics</option>
    	<option value="Civics">Civics</option>

  		</select></div>
		<div id="qtitle">Type of The Question:</div>
		<div id="radiobar"><input type="radio" name="typeofq" value="fill" checked="checked">Fill in the blanks</div>
		<div id="radiobar"><input type="radio" name="typeofq" value="tf" >True/False</div>
		<div id="radiobar"><input type="radio" name="typeofq" value="short" >Short Answers</div>
		<div id="radiobar"><input type="radio" name="typeofq" value="long" >long Answers</div>
		<div id="qtitle">Question:</div>
		<textarea rows="15" cols="100" name="question" ></textarea>
		<div id="qtitle">Question meta:</div>
		<input type="text" name="qmeta" required>
		<input type="hidden" name="datetime" value="<?php $date = date('m/d/Y h:i:s a', time()); echo $date;?>">
		 <div id="submit"><button type="submit" name="submit">Submit</button></div>
	
</form>
</body>