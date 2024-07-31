<?php 
require_once("includes/config.php");
if(isset($_POST['submit']))
{
	$errors = array();
	$errors = validate_signup();
	if(count($errors)==0)
	{
		$sql = mysql_fetch_assoc(mysql_query("select email from users where email='".$_POST['email']."'"));
		if(isset($sql['email']))
		{
			$infrm = "This Email already register";	
		}
		else
		{
			$insert = "insert into users set 
			name='".$_POST['name']."',
			email='".$_POST['email']."',
			password=md5('".$_POST['password']."'),
			created=Now()";
			if(mysql_query($insert))
			{
				$msg = "Register Success";
			}
			else
			{
				$infrm = "Register Fail";
			}
		}
	}
	
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Signup</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<div id="container">
		<?php require_once("includes/header.php"); ?>
		<form method="post">
		<table cellpadding="10px" cellspacing="0px" width="600px" align="center" border="1">
			<tr>
				<td colspan="2">
					<?php 
						if(isset($msg))
						{
							echo "<div class='msg'>$msg</div>";
						}
						if(isset($infrm))
						{
							echo "<div class='infrm'>$infrm</div>";
						}
					
					?>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"/>
				<?php if(isset($errors['name'])){?>
				<div class="error">
					<?php echo $errors['name'];?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td>User Name/Email</td>
				<td><input type="email" name="email"/>
				<?php if(isset($errors['email'])){?>
				<div class="error">
					<?php echo $errors['email'];?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/>
				<?php if(isset($errors['password'])){?>
				<div class="error">
					<?php echo $errors['password'];?>
				</div>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Register"/>
				<input type="button" name="signup" value="Back to Login" onclick="window.location='index.php'"/>
				</td>
			</tr>
		</table>	
		</form>
		<?php require_once("includes/footer.php"); ?>
		</div>
	</body>
</html>