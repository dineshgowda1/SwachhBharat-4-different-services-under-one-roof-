$(document).ready(function(){
	$("#rsubmit").click(function(){
			$(".error_data_reg").fadeOut();
            
			$.post("process_register.php",$("#reg-form").serializeArray(),
				   function(data){
				   	console.log(data);
				   		switch(data)
				   		{
							case "":
								$(".error_data_reg").addClass("alert-danger").html("Field is not set").fadeIn();
								break;
				   			case "1":
				   				$("#submit-form").find("input[type='email']").val("");
		   						$("#submit-form").find("input[type='password']").val("");
		   						$("#submit-form").find("input[type='text']").val("");
		   						$("#submit-form select").val("");
		   						$("#submit-form").find("input[type='checkbox']").val("");
		   						$("#error_password").fadeOut();
		   						$("#reerror_repassword").fadeOut();
		   						$(".error_data_reg").removeClass("alert-danger").addClass("alert-success").html("Successfully Registered. <a href='' data-dismiss='modal' data-toggle='modal' data-target='#loginmdl'>Log in</a> to continue.").fadeIn();
		   						
		   						break;	
				   			case "10":
								$(".error_data_reg").addClass("alert-danger").html("All fields are required").fadeIn();
		   						break;
		   					case "11":
		   						$(".error_data_reg").addClass("alert-danger").html("Only letters in the name").fadeIn();
		   						break;
							case "11a":
		   						$(".error_data_reg").addClass("alert-danger").html("Enter FirstName LastName").fadeIn();
		   						break;
							case "11b":
		   						$(".error_data_reg").addClass("alert-danger").html("Name should contain only one space").fadeIn();
		   						break;		
		   					case "b12":
		   						$(".error_data_reg").addClass("alert-danger").html("Invalid name").fadeIn();
		   						break;
		   					case "b14":
		   						$(".error_data_reg").addClass("alert-danger").html("Password length should be more than 6").fadeIn();
		   						break;
		   					case "13":
		   						$(".error_data_reg").addClass("alert-danger").html("Invalid email").fadeIn();
		   						break;
		   					case "a14":
		   						$(".error_data_reg").addClass("alert-danger").html("Password must be alphanumeric").fadeIn();
		   						break;
		   					case "15":
		   						$(".error_data_reg").addClass("alert-danger").html("Password does not match").fadeIn();
		   						break;	
		   					case "16":
		   						$(".error_data_reg").addClass("alert-danger").html("Please check terms & conditions").fadeIn();
		   						break;
                            case "20":
		   						$(".error_data_reg").addClass("alert-danger").html("Email already exist").fadeIn();
		   						break;
							case "21":
		   						$(".error_data_reg").addClass("alert-danger").html("Fields cannot contain white spaces").fadeIn();
		   						break;
		   					default:
		   						//$(".error_data_reg").addClass("alert-danger").html(data).fadeIn();
				   		}

				   });
	return false;
    })
});