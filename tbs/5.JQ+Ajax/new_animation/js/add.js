$("document").ready(function(){
	$(".error").hide();
	$("#insert").hide();
	$("#change").hide();
	$("#changeregister").hide();
	$(".lcontent").hide();
	$("#otp").hide();
	$("#OTP_NUM").hide();
	
	/*---------------Code for submit button----*/	
	$("#save").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		
		var pattern_name=/^[A-Za-z' ]{1,80}$/i;
		var pattern_email=/^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
		
		
		if(name=='')
		{
			var ename = "Please Enter Name";
			$("#ename").text(ename).fadeIn();
			setTimeout(function(){
		        $("#ename").fadeOut("slow");
			},3000);
			return false;
		}
		else if(!pattern_name.test(name))
		{
			var ename = "Please Enter Valid Name";
			$("#ename").text(ename).fadeIn();
			setTimeout(function(){
				$("#ename").fadeOut("slow");
			},3000);
			return false;
		}
		if(email=='')
		{
			var eemail = "Please Enter Email";
			$("#eemail").text(eemail).fadeIn();
			setTimeout(function(){
				$("#eemail").fadeOut("slow");
			},3000);
			return false;
		}
		else if(!pattern_email.test(email))
		{
			var eemail = "Please Enter Valid Email";
			$("#eemail").text(eemail).fadeIn();
			setTimeout(function(){
				$("#eemail").fadeOut("slow");
			},3000);
			return false;
		}
		if(mobile=='')
		{
			var emobile = "Please Enter mobile";
			$("#emobile").text(emobile).fadeIn();
			setTimeout(function(){
				$("#emobile").fadeOut("slow");
			},3000);
			return false;
		}
		
		$("#changeregister").show();
		$("#register").hide();
		$("#save").hide();
		$("#insert").show();
		$("#change").show();
		$("#otp").show();
	    $("#OTP_NUM").show();
		});
		
		$("#insert").click(function(){	
		var name = $("#name").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var otp = $("#otp").val();
		
		
		var pattern_name=/^[A-Za-z' ]{1,80}$/i;
		var pattern_email=/^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
		
		
		if(name=='')
		{
			var ename = "Please Enter Name";
			$("#ename").text(ename).fadeIn();
			setTimeout(function(){
		        $("#ename").fadeOut("slow");
			},3000);
			return false;
		}
		else if(!pattern_name.test(name))
		{
			var ename = "Please Enter Valid Name";
			$("#ename").text(ename).fadeIn();
			setTimeout(function(){
				$("#ename").fadeOut("slow");
			},3000);
			return false;
		}
	
		if(email=='')
		{
			var eemail = "Please Enter Email";
			$("#eemail").text(eemail).fadeIn();
			setTimeout(function(){
				$("#eemail").fadeOut("slow");
			},3000);
			return false;
		}
		else if(!pattern_email.test(email))
		{
			var eemail = "Please Enter Valid Email";
			$("#eemail").text(eemail).fadeIn();
			setTimeout(function(){
				$("#eemail").fadeOut("slow");
			},3000);
			return false;
		}
		if(mobile=='')
		{
			var emobile = "Please Enter mobile";
			$("#emobile").text(emobile).fadeIn();
			setTimeout(function(){
				$("#emobile").fadeOut("slow");
			},3000);
			return false;
		}
		
		else
		{
			$.ajax({
				type:'post',
				url:'add.php',
				data:'name='+name+'&email='+email+'&mobile='+mobile+'&otp='+otp,
				cache:false,
				success:function(returndata)
				{
					if(returndata==0)
					{
						var msg = "Mobile already exist";
						$("#msg").text(msg).show();
					}
					else if(returndata==1)
					{
						var msg = "You are successfully registered.";
						$("#msg").text(msg).show();
					    window.location="otpgeneration.html";
					}
					else
					{
						var msg = "You are failed to registered."
						$("#msg").text(msg).show();
					    window.location="register.html";
					}
				}
			
			});	
			
		}
		
	});
});
