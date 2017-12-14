function validateEmail(email) {
  		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
	}
function emailval() {
  $("#etext").text("");
  var email = $("#emailid").val();
  if (validateEmail(email)) {
  	serverCheck(email);
  } 
  	else {
  	$("#etext").text("Invalid Email Format");
  	$("#etext").css("color","red");
  	
  }
  return false;
}
	function serverCheck(email){
		if (email)
		{
			$.ajax({
				type: 'post',
				url: 'common/checkmail.php',
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
  			$( '#etext' ).html("");
  			return false;
 		}
	}
