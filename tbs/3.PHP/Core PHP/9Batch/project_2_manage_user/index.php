<?php 
require_once("includes/config.php");
if(isset($_POST['submit']))
{
	if(empty($_POST['email']) && empty($_POST['password']))
	{
		$err = "Please Enter Login Credentials";
	}	
	else	
	{
		$sql = mysql_fetch_assoc(mysql_query("select * from users where email='".$_POST['email']."' and password=md5('".$_POST['password']."')"));
		//print_r($sql);exit;
		if(isset($sql['id']))
		{
			if($sql['status']=='active')
			{
				$_SESSION['auth'] = $sql;
				unset($_SESSION['auth']['password']);
				//print_r($_SESSION['auth']);exit;
				header("location:dashboard.php");
			}
			else
			{
				$err = "Your account is inactive. Please Contact Admin";
			}
		}
		else
		{
			$err = "You are not authorised user";
		}
	}
	
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
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
						if(isset($err))
						{
							echo "<div class='error'>$err</div>";
						}
				?>
				</td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="email"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Login"/>
				<input type="button" name="signup" value="Register" onclick="window.location='signup.php'"/>
				</td>
			</tr>
		</table>	
		</form>
		<?php require_once("includes/footer.php"); ?>
		</div>
	</body>
</html>