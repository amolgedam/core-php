
				$("#save").click(function(){
					//Variable to collect controls value
					var name = $("#name").val();
					var email = $("#email").val();
					var mobile = $("#mobile").val();
					
					var pattern_name=/^[A-Za-z' ]{1,80}$/i;
					var pattern_email=/^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
					//alert(name + email + mobile);
					
					if(name=="")
					{
						var ename = "Please Enter Name";
						$("#name").text(name).show();
						setTimeout(function(){
							$("#name").fadeOut("slow");
						},3000);
						$("#name").focus();
						
						return false;
					}
					else if(!pattern_name.test(name))
					{
						var ename = "Please Enter Valid Name";
						$("#name").text(name).show();
						setTimeout(function(){
							$("#name").fadeOut("slow");
						},3000);
						$("#name").focus();
						return false;
					}
					
					if(email=="")
					{
						var eemail = "Please Enter Email";
						$("#email").text(email).show();
						setTimeout(function(){
							$("#email").fadeOut("slow");
						},3000);
						$("#email").focus();
						return false;
					}
					else if(!pattern_email.test(email))
					{
						var eemail = "Please Enter Valid Email";
						$("#email").text(eemail).show();
						setTimeout(function(){
							$("#email").fadeOut("slow");
						},3000);
						$("#email").focus();
						return false;
					}
					if(mobile=="")
					{
						var emobile = "Please Enter Mobile";
						$("#mobile").text(mobile).show();
						setTimeout(function(){
							$("#mobile").fadeOut("slow");
						},3000);
						$("#mobile").focus();
						return false;
					}
					else
					{
									$("#save").hide();
									$("#update").show();
									$("#confirm").show();
									$('input:text').attr("readonly", "readonly");
						
					}
				});