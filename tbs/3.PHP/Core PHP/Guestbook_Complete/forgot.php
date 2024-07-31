<?php 
require_once("includes/config.php");
if(isset($_POST['signup']))
{
	
	$errors = validate_signup();
	//print_r($errors);
	if(!count($errors))
	{
		$sql = mysql_query("select * from users where email_address='".$_POST['email_address']."'");
		if(mysql_num_rows($sql))
		{
			$error = "Email Already Exist";
		}
		else
		{
			$insert = "insert into users set 
			name='".$_POST['name']."',
			email_address='".$_POST['email_address']."',
			password=md5('".$_POST['password']."'),
			created=Now()";
			if(mysql_query($insert))
			{
				$success =  "Reg. Success";
			}
			else
			{
				$error = "Reg. Failed";
			}
		}
	}
}
?>
<html>
     <head>
	     <title>Forgot password</title>
	     <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 <body> 
	     <div class="head">
		     <h1>GUESTBOOK</h1>
	     </div>
        <div class="t_table">		 
       <form method="post">
	     <div id="header">
	     <h2>Sign up</h2>
	     </div></br></br>		 
	     <label> Email </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	     <input type="email" name="email_address" value="" size="40px"required/></br></br>
	      <?php if (isset($errors['email_address'])) { ?>
	      <div class="errors">
	     <?php echo ($error['email_address']);?>
	     </div>
	     <?php } ?>
	     <div id="b_box">
	     <button class="button" type="submit" name="save">
         <img src="images/icons/tick.png" alt="Save" />submit
          </button> 
	 </div>
	 </form>
	 </div>
	 </body>
</html>