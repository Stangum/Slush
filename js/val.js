function validateEmail(email) {
  		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
	}
function emailval() {
  $("#etext").text("");
  var email = $("#emailid").val();
  if (validateEmail(email)) {
  	serverCheck(email);
    return true;
  } 
  	else {
  	$("#etext").text("Invalid Email Format");
  	$("#etext").css("color","red");
    return false;	
  }
}
	function serverCheck(email){
		if (email)
		{
			$.ajax({
				type: 'post',
				url: 'checkmail.php',
				data:{
					user_email: email,
				},
				success: function(response){
					if(response=="OK")	
   					{
						$( '#etext' ).text("Valid Email Address");
						$("#etext").css("color","green");
  						
    					return true;	
   					}
   					else
  					{
						$( '#etext' ).text(response);
						$("#etext").css("color","red");
  					
    					return false;	
   					}
				}
			});
		}
		else
 		{
  			$( '#etext' ).text("");
  			return false;
      }
	}
function checkfname()
{
    var fname = $("#fname").val();
    if(fname = "" || !/^[A-Za-z\s]+$/.test(fname))
    {
      $('#fname-div').css("color" , "red");
      return false;
    }
    else{
        $('#fname-div').css("color" , "green");
      return true;
      }
}
function checklname()
{
    var lname = $("#lname").val();
    if(lname == "" || !/^[A-Za-z\s]+$/.test(lname))
    {

      $('#lname-div').css("color" , "red");
      return false;
    }
    else{
        $('#lname-div').css("color" , "green");
        return true;
    }
}
/*function passcheck(pass)
{
  var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  return passw.test(pass); 
}*/
function checkPass()
{
  var pass = $("#pwd").val();
  //var flag = passcheck(pass); 
  if(!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/.test(pass))   
  { 
    $('#pwd-div').text("Your Password Must Contain At Least 8 Characters. 1 Uppercase Charecter. 1 Lowercase Charecter. 1 Number!!!");
    $('#pwd-div').css("color" , "red"); 
    $('#pwd-div').css("font-size", "9px");  
    return false;  
  }  
  else  
  { 
    $('#pwd-div').text("Valid Password");
    $('#pwd-div').css("color" , "green");   
    return true; 
  }  
}
function confirmPass()
{
  var pass = $("#pwd").val();
  var cpass = $("#cpwd").val();
  if(pass == cpass && !cpass == "")
  {
    $("#cpwd-div").text("Alright...");
    $("#cpwd-div").css("color" , "green");

    return true;
  }
  else if(cpass == "")
  {
    $("#cpwd-div").text("Don't leave Password Field Blank")
    $("#cpwd-div").css("color" , "red");
    return false;
  }
  else{
    $("#cpwd-div").text("Passwords Don't Match");
    $("#cpwd-div").css("color" , "red");
    return false;
  }
}
function uidval() {
  $("#Username").text("");
  var uname = $("#uname").val();
  if (uname) {
    serverCheckUid(uname);
    return true;
  } 
    else {
    $("#Username").text("Invalid Email Format");
    $("#Username").css("color","red");
    return false; 
  }
}
  function serverCheckUid(uname){
    if (uname)
    {
      $.ajax({
        type: 'post',
        url: 'checkuid.php',
        data:{
          user_uid: uname,
        },
        success: function(response){
          if(response=="OK")  
            {
            $( '#Username' ).text("Valid");
            $("#Username").css("color","green");
              
              return true;  
            }
            else
            {
            $( '#Username' ).text(response);
            $("#Username").css("color","red");
            
              return false; 
            }
        }
      });
    }
    else
    {
        $( '#Username' ).text("");
        return false;
      }
  }
function checkall()
{
  if(emailval() || checkfname() || servercheck() || checkPass() || confirmPass() || checklname() || uidval() )
  {
    return true;
  }
  else
  {
    alert("Please correct the Errors Below to Proceed further!!!");
    return false;
  }
}
