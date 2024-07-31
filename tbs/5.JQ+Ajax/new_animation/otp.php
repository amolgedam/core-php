<?php
require_once("includes/config.php");
$users = new users;
$sql = $users->select($users->table,'','',"otp DESC",'');
?>
<html>
   <head>
   <title>OTP generation</title>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$("document").ready(function(){

			$("#confirmation").click(function(){
			//alert("hi");
			var result = $("#textbox1").val();
			var otpres = $("#textbox2").val();
			if(result==otpres)
			{
			     window.location = "contact.html";
			}
		
		});
	});
	</script>
	</head>
	<body>
        <div id="container">
		<header>
			<img src="images/logo.jpg" alt=""/>
		</header>
	    <article>
			<div id="otp_header">OTP Confirmation Page</div>
			
			<div id="otp_confirm">Your OTP number is :&nbsp;<font color="red"><?php echo $sql['0']['otp']?></font></div>
		    <div><input type="hidden" name="otp" id="textbox1" value="<?php echo $sql['0']['otp']?>" /></div>
			<div id="otp_text">Enter your OTP number.</div>
			<div><input type="text" name="otp" id="textbox2"/></div>
			<div><input type="button" value="Confirm" id="confirmation"/><div>
		
	    </article>
				<footer>&copy; Copyright 2016. All Rights Reserved.</footer>
		</div>
	</body>
</html>		
