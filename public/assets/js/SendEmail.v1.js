// JavaScript Document
$(document).ready(function() {
	
	$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    	////CKEDITOR.replace('dtls');
  	});	
	
	/*$( "#cancel" ).click(function() {
		$(location).attr('href','listPrograms.php');
	});*/
	
	$( "#CntFrm" ).submit(function() {

		
		//alert("HERE");
		var name1 = $('#name').val();
		var email1 = $('#email').val();
		//var phone1 = $('#userPhone').val();
		var msg1= $('#message').val();

		var flag = 1;
	  	//$("#msg").show();	
		
		//$("#err-ttle").hide();
		//$("#err-name, #err-email, #err-password, #err-dob, #err-gender").hide();
		$("#userName, #userEmail, #userMsg").css({"border": "0px"}); 

		if($.trim(name1)=='')
		{
			$("#err-userName").text('Enter name');	  	
			$("#err-userName").show();	
			$("#userName").css({"border": "1px solid red"});
			var flag = 0;
		}
		
		if($.trim(email1)=='')
		{
			$("#err-ttle").text('Enter email');	  	
			$("#err-ttle").show();	
			$("#userEmail").css({"border": "1px solid red"});
			var flag = 0;
		}
		
		if($.trim(msg1)=='')
		{
			$("#err-ttle").text('Enter message');	  	
			$("#err-ttle").show();	
			$("#userMsg").css({"border": "1px solid red"});
			var flag = 0;
		}
		
		//alert(flag);
		if(flag)
	  	{
		 // return false;
			$("#save").attr("disabled", "disabled");
			$('#save').val('Sending ..');
			
			$('#userName').attr("disabled", "disabled");
			$('#userEmail').attr("disabled", "disabled");
			$('#userMsg').attr("disabled", "disabled");
			//alert(phone1);
			$.ajax({
			type: "POST",
			url: "../bp/SendEmail.php",
			data: {
				name: name1,
				email: email1,
				//phone:phone1,
				msg:msg1
			},
			dataType: "JSON",
			success: function(response){
				//alert('hi');
				var ErrTxt = response.isError;
				//alert(response);
				if(response.isError==1)
				{
					
					$(location).attr('href','contact.php#contact');
					//$("#password1").css({"border": "1px solid red"});
					
					/*
					$("#password1").css({"border": "1px solid red"});
					$("#password2").css({"border": "1px solid red"});
					$("#password3").css({"border": "1px solid red"});
						$("#err-password3").text(response.error);	  	
						$("#err-password3").show();	
					*/
				}
				else 
				{
					var msg = response.msg;
					//$("#save").attr("disabled", "disabled");
					$("#save").removeAttr("disabled", "disabled");
					$('#save').val('Send Message');
					
					$('#userName').removeAttr("disabled", "disabled");
					$('#userEmail').removeAttr("disabled", "disabled");
					$('#userMsg').removeAttr("disabled", "disabled");
							//alert(msg);
					$("#userName").css({"border": "0px"});
					$("#userEmail").css({"border": "0px"});
					$("#userMsg").css({"border": "0px"});
					//$(location).attr('href','index.php#contact');
					//$("#msg").text("Email Sent!");
					$("#msg").show().delay(5000).fadeOut();
				}
				$('#save').text('Save');
				
			}
		});  
	    
	  }
		//$(location).attr('href','index.php#contact');
	  return false;
	 // $( "#login" ).submit();
	});
	

});