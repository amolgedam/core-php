<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
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
		<?php require_once("includes/nav.php"); ?>
		
		
		
		<?php require_once("includes/footer.php"); ?>
		</div>
	</body>
</html>