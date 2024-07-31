<?php
require_once('includes/config.php');

if(isset($_POST['login']))
{
    $errors=array();
    $errors=validate_login();
    if(!count($errors))
   {
	
	 $select = mysql_fetch_assoc(mysql_query("select * from users where email_address='".$_POST['email_address']."' and password=md5('".$_POST['password']."')"));
     // print_r($select);
     // exit;
      if(isset($select['id']))
		{
			$_SESSION['auth'] = $select;
			unset($_SESSION['auth']['password']);
			//print_r($_SESSION['auth']);exit;
			header("location:dashboard.php");
		}
		else
		{
			$error = "Logged in unsuccessful";
		}	
}	
	
}
?>
<html>
     <head>
	     <title>login form</title>
		 <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 <body>
	    <div id="container">
		<div class="head">
		<h1>GUESTBOOK</h1>
		</div>
	     <form method="post">
		 <div id="content1">
		 <h3 id="header">Login</h3>
		     <div>
			     <label>Email Address :</label>
				 <input type="email" name="email_address" size="57px" value="<?php echo isset($_POST['email_address'])?$_POST['email_address']:'';?>"/>
				 <?php if(isset($errors['email_address'])) { ?>
				 <div class="errors">
				 <?php echo $errors['email_address']; ?>
				 </div>
				 <?php } ?>
			 </div></br></br>
			 <div>
			     <label>Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <input type="password" name="password" value="" size="57px"/>
				 <?php if(isset($errors['password'])) { ?>
				 <div class="errors">
				 <?php echo $errors['password']; ?>
				 </div>
				 <?php }?>
			 </div></br></br>
			 <div id="b_box">
			     <button class="button" type="submit" name="login" >
				 <img src="images/icons/key.png"/>login</button> or
				 <a href="signup.php">Create an account</a>
			 </div></br>
			 <div>If you forgot the password.Please click on  <a href="forgot.php">Forget Password </a></div>
			 </div>
		 </form>
		 </div>
	 </body>
</html>