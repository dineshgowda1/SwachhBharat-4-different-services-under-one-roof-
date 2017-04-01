$(document).ready(function(){
	$("#lsubmit").click(function(){
			$(".error_data").fadeOut();
			$.post("login.php",$("#submit-form").serializeArray(),
				   function(data){
					console.log(data);
				   		switch(data)
				   		{
				   			case "10":	//empty field
								$(".error_data").addClass("alert-danger").html("All fields are required").fadeIn();
		   						break;
							case "":
								$(".error_data").addClass("alert-danger").html("Field is not set").fadeIn();
		   						break;
		   					case "11":
		   						$("#submit-form").find("input[type='password']").val("");
		   						$(".error_data").addClass("alert-danger").html("Username or Password is invalid!").fadeIn();
		   						break;
		   					case "1":
		   						window.location.href="index.php";
		   						break;
							case "2":
		   						window.location.href="admin.php";
		   						break;
		   					default:
		   						$(".error_data").addClass("alert-danger").html(data).fadeIn();
				   		}
				   });
			return false;
		});
	});