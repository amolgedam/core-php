<?php 
require_once("includes/config.php");

if(isset($_POST['login']))
{
	$errors = array();
	$errors = validate_login();
	if(!count($errors))
	{
		$select = mysql_fetch_assoc(mysql_query("select * from users where email_address='".$_POST['email_address']."' and password=md5('".$_POST['password']."')"));
		//print_r($select);exit;
		if(isset($select['id']))
		{
			if($select['status']=='active')
			{
				$_SESSION['auth'] = $select;
				unset($_SESSION['auth']['password']);
				//print_r($_SESSION['auth']);exit;
				header("location:dashboard.php");
			}
			else
			{
				$error= "Your account is inactive please contact Admin.";
			}				
		}
		else
		{
			$error = "You are not authorised";
		}
	}
}


?>

<html>
	<head>
		<title>Login</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - LOGIN</h1>
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
				<td><input type="submit" name="login" value="Login"/><input type="button" name="register" value="Register" onclick="window.location='signup.php'"/></td>
			</tr>
		</table>
		</form>	
<h6>&copy; Copyright 2016. All Rights Reserved</h6>		
	</body>
</html>