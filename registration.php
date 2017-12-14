
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="js/val.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="register.php" method="post" onsubmit = "return checkall()">
          
          <div class="top-row">
            <div class="field-wrap">
              <label id="fname-div">
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="idxf-name" id="fname" onkeyup = "checkfname()" />
            </div>
        
            <div class="field-wrap">
              <label id = "lname-div">
                Last Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="idxl-name" id="lname" onkeyup = "checklname()"/>
            </div>
          </div>
          <div class="field-wrap">
            <label id="Username">
              Username<span class="req" >*</span>
            </label>
            <input type="text" required autocomplete="off" id="uname" name="uid" onblur="uidval()" />
          </div>

          <div class="field-wrap">
            <label id="etext">
              Email Address<span class="req" >*</span>
            </label>
            <input type="email" required autocomplete="off" id="emailid" name="emailid" onblur="emailval()" />
          </div>
          
          <div class="field-wrap">
            <label id="pwd-div">
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="idx-pwd" id="pwd" onblur="checkPass()" />
          </div>
          <div class="field-wrap">
            <label id="cpwd-div">
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="idxc-pwd" id="cpwd" onpaste = "return false" onkeyup="confirmPass()"/>
          </div>
          
          <button type="submit" class="button button-block" name="submit" id="btn-sbmt"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="uid" id="uid"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="pwd" id="pwd"/>
          </div>

          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" name="submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

    <script src="js/index.js"></script>

</body>
</html>
