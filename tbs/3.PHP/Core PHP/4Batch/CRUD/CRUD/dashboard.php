<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
?>

<html>
	<head>
		<title>Dashboard</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - DASHBOARD</h1>
		<?php require_once("includes/nav.php");?>	
		<h6>&copy; Copyright 2016. All Rights Reserved</h6>	
	</body>
</html>