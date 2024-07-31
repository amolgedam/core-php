			$("document").ready(function(){
			//alert("Page loding JQ Successfully");	
				$("#update").hide();
				$("#confirm").hide();
				$(".error").hide();
				
				$("#save").click(function(){
					//Variable to collect controls value
					var name = $("#name").val();
					var email = $("#email").val();
					var mobile = $("#mobile").val();
					
					var pattern_name=/^[A-Za-z' ]{1,80}$/i;
					var pattern_email=/^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
					var pattern_mobile=/^[\+]\d{2}[\{]\d{4}[\-]\d{4}$/i;
					//alert(name + email + mobile);
					
					if(name=="")
					{
						var ename = "Please Enter Name";
						$("#ename").text(ename).show();
						setTimeout(function(){
							$("#ename").fadeOut("slow");
						},3000);
						$("#name").focus();
						return false;
					}
					else if(!pattern_name.test(name))
					{
						var ename = "Please Enter Valid Name";
						$("#ename").text(ename).show();
						setTimeout(function(){
							$("#ename").fadeOut("slow");
						},3000);
						$("#name").focus();
						return false;
					}
					
					if(email=="")
					{
						var eemail = "Please Enter Email";
						$("#eemail").text(eemail).show();
						setTimeout(function(){
							$("#eemail").fadeOut("slow");
						},3000);
						$("#email").focus();
						return false;
					}
					else if(!pattern_email.test(email))
					{
						var eemail = "Please Enter Valid Email";
						$("#eemail").text(eemail).show();
						setTimeout(function(){
							$("#eemail").fadeOut("slow");
						},3000);
						$("#email").focus();
						return false;
					}
					if(mobile=="")
					{
						var emobile = "Please Enter Mobile";
						$("#emobile").text(emobile).show();
						setTimeout(function(){
							$("#emobile").fadeOut("slow");
						},3000);
						$("#mobile").focus();
						return false;
					}
					else if(!pattern_mobile.test(name))
					{
						var ename = "Please Enter Valid Mobile Number";
						$("#emobile").text(ename).show();
						setTimeout(function(){
							$("#emobile").fadeOut("slow");
						},3000);
						$("#mobile").focus();
						return false;
					}
					else
					{
						//alert(name + email + mobile);
						var datastring = "name="+name+"&email="+email+"&mobile="+
						mobile;
						
						$.ajax({
							type:'POST',
							url:'add.php',
							data:datastring,
							cache:false,
							
							success:function(returndata){
								//alert(returndata);
								if(returndata == 0)
								{
									var msg = "Please Enter All Details";
									$("#msg").text(msg).show();
									$("#msgtr").show();
								}
								else if(returndata == 1)
								{
									var msg = "Mobile already Register";
									$("#msg").text(msg).show();
									$("#msgtr").show();
								}	
								else
								{
									var msg = "Register Success";
									$("#msg").text(msg).show();
									$("#msgtr").show();
								}								
							}
						
						});
						
					}
				});
			});	
				$("#show").click(function(){
					window.location='show.html';
				});
				
				
				
			});