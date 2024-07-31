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
		<title>Signup</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - SIGNUP</h1>
		<form method="post">
		<table cellpadding="10px" cellspacing="0px" align="center" width="500px" border="1">
			<tr>
				<td colspan="2">
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
				</td>
			</tr>
			<tr>
				<td>Name :</td>
				<td><input type="text" name="name" required value="<?php echo isset($_POST['name'])?$_POST['name']:'';?>"/>
				<?php if(isset($errors['name'])){?>
				<div class="errors">
				<?php echo $errors['name']; ?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Email Address :</td>
				<td><input type="email" name="email_address" required value="<?php echo isset($_POST['email_address'])?$_POST['email_address']:'';?>"/>
				<?php if(isset($errors['email_address'])){?>
				<div class="errors">
				<?php echo $errors['email_address']; ?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password" required/>
				<?php if(isset($errors['password'])){?>
				<div class="errors">
				<?php echo $errors['password']; ?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="signup" value="Signup"/><input type="button" name="back" value="Back To Login" onclick="window.location='index.php'"/></td>
			</tr>
		</table>
		</form>	
		<h6>&copy; Copyright 2016. All Rights Reserved</h6>			
	</body>
</html>