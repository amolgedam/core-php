<?php 
require_once("includes/config.php");
if(isset($_POST['signup']))
{
	
	$errors = validate_signup();
	//print_r($errors);
	if(!count($errors))
	{
		$db = mysql_query("select * from users where email_address='".$_POST['email_address']."'");
		if(mysql_num_rows($db))
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
				$success =  "Registration Success";
			}
			else
			{
				$error = "Registration Failed";
			}
		}
	}
}
?>
<html>
     <head>
	     <title>sign up</title>
		 <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 <body>
	 <div id="container">
	 <div class="head">
		<h1>GUESTBOOK</h1>
		</div>
	     <form method="post">
		 		<div id="content">
		       <h3 id="header">Sign Up</h3>
		     <div>
			 <?php 
					if(isset($success))
					{
						echo "<font style='color:green'>".$success."</font>";
					}
					if(isset($error))
					{
						echo "<font style='color:red'>".$error."</font>";
					}
				?>
			 </div></br>
		    <div>
			<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="name" size="55px" value="<?php echo isset($_POST['name'])?$_POST['name']:'';?>" required/>
			<?php if(isset($errors['name'])) { ?>
			<div class="errors">
			 <?php echo $errors['name']; ?>
			</div>
			<?php } ?>
		     </div></br></br>
			 <div>
			<label>Email Address</label>
			<input type="email" name="email_address" size="55px"  value="<?php echo isset($_POST['email_address'])?$_POST['email_address']:'';?>"required/>
			<?php if(isset($errors['email_address'])) { ?>
			<div class="errors">
			<?php echo $errors['email_address']; ?>
			</div>
			<?php } ?>
		     </div></br><br>
			 <div>
			<label>Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="password" name="password" size="55px" required/>
				<?php if(isset($errors['password'])){?>
				<div class="errors">
				<?php echo $errors['password']; ?>
				</div>
				<?php } ?>
		     </div></br></br>
			 <div id="b_box">
			     <button class="button" type="submit" name="signup" value="signup">
				 <img src="images/icons/tick.png"/>Sign up</button>
				 <button type="button" name="back" onclick="window.location='index.php'"/>Back</button>
			  </div>	 
		 </form>
	 </body>
</html>