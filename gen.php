<?php
error_reporting(E_ERROR);
session_start();
date_default_timezone_set('America/Los_Angeles');
if(!isset($_SESSION['uid'])){
	header("location:registration.php?err=login");
}
?>
<head>
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <link href="css/boot.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<?php include("include/header.php");?>
<div class="body1">
<div id="headtitle">SOLVE QUESTION +</div>
<form action="" method="post">

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
	 	<select name="subject" required>
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
		<div id="radiobar"><input type="checkbox" name="typeofq[]" value="fill" checked="checked">Fill in the blanks</div>
		<div id="radiobar"><input type="checkbox" name="typeofq[]" value="tf" >True/False</div>
		<div id="radiobar"><input type="checkbox" name="typeofq[]" value="short" >Short Answers</div>
		<div id="radiobar"><input type="checkbox" name="typeofq[]" value="long" >long Answers</div>
        <div id="qtitle">No of Question:</div>
        <input type="text" name="no"/>
        <button type="submit" name="generate">Generate</button>
        </form>
    </div>
    </div>
</body>
<?php 
    if(isset($_POST['generate'])){
        include("include/dbconnect.php");
        $no=mysqli_real_escape_string($conn,$_POST['no']);
        $type = array();
        $type = $_POST['typeofq'];
        $typecount = count($type);
        $no=intval($no);
        $class= $_POST['classm'];
        $subject= $_POST['subject'];
        $prep=array(array());
        if($typecount == 1)
        {
            $sql= "SELECT uid,q_dtime,q_con,q_type FROM qdb WHERE class='$class' and sub='$subject' and q_type='$type[0]'  ORDER BY RAND() LIMIT 1";
        }
        if($typecount == 2)
        {
            $sql= "SELECT uid,q_dtime,q_con,q_type FROM qdb WHERE class='$class' and sub='$subject' and q_type='$type[0]' or q_type='$type[1]' ORDER BY RAND() LIMIT 1";
        }
        if($typecount == 3)
        {
            $sql= "SELECT uid,q_dtime,q_con,q_type FROM qdb WHERE class='$class' and sub='$subject' and q_type='$type[0]' or q_type='$type[1]' or q_type='$type[2]' ORDER BY RAND() LIMIT 1";
        }
        if($typecount == 4)
        {
            $sql= "SELECT uid,q_dtime,q_con,q_type FROM qdb WHERE class='$class' and sub='$subject' and q_type='$type[0]' or q_type='$type[1]' or q_type='$type[2]' or q_type='$type[3]' ORDER BY RAND() LIMIT 1";
        }

        for($i=0 ; $i<$no ; $i++)
        {
                $res=mysqli_query($conn, $sql);
                $rescount=mysqli_num_rows($res);
                $row=mysqli_fetch_assoc($res);
                if($rescount<1)
                {
                    //header("location:index.php?err=queryerr");
                }
                //uncomment edit the code here for question duplicancy
                /*else{
                    if($i=0)
                    {
                        $prep[$i]['qest']=$row['q_con'];
                        $prep[$i]['uid']=$row['uid'];
                        $prep[$i]['dtime']=$row['q_dtime'];

                    }
                    else{
                        for($j=o;$j<=i;$j++)
                        {
                            if($prep[$j]['qest']==$row['q_con'])
                            {
                                    $i--;
                            }
                            else
                            {
                                $prep[$i]['qest']=$row['q_con'];
                                $prep[$i]['uid']=$row['uid'];
                                $prep[$i]['dtime']=$row['q_dtime'];
                            }
                        }
                    }
                }*/
                //if upper one is edited delete this code
                $prep[$i]['qest']=$row['q_con'];
                $prep[$i]['uid']=$row['uid'];
                $prep[$i]['dtime']=$row['q_dtime'];
                $prep[$i]['type']=$row['q_type'];
        }
        $_SESSION['pdfdata']=$prep;
        $_SESSION['no']=$no;
        $_SESSION['sub']=$subject;
        $_SESSION['class']=$class;
        if(isset($_SESSION['pdfdata'])){
        header("location:include/genpdf.php");
        //print_r($prep);
        }
    }
?>
