<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
if(isset($_GET['id']))
{
	$select = mysql_fetch_assoc(mysql_query("select * from friends where id=".$_GET['id']));
	
}
else
{
	header("location:manage_friends.php");
}

?>

<html>
	<head>
		<title>Show Friend Details</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - FRIEND DETAILS</h1>
		<?php require_once("includes/nav.php")?>
		<table cellpadding="10px" cellspacing="0px" width="400px" align="center" border="1">
			<tr>
				<th colspan="2"> Details of : <?php echo strtoupper($select['name']);?></th>
			</tr>
			<tr>
				<th>Address :</th>
				<td><?php echo $select['address'];?></td>
			</tr>
			<tr>
				<th>Gender : </th>
				<td><?php echo $select['gender'];?></td>
			</tr>
			<tr>
				<th>Hobbies : </th>
				<td><?php echo $select['hobbies'];?></td>
			</tr>
			<tr>
				<th>City : </th>
				<td><?php 
				$getcity = mysql_fetch_assoc(mysql_query("select * from cities where id='".$select['city_id']."'"));
				echo $getcity['name'];
				?></td>
			</tr>
			<tr>
				<th>Avatar : </th>
				<td><img src="images/avatar/<?php echo $select['avatar'];?>" alt="avatar"/></td>
			</tr>
			<tr>
				<th></th>
				<td><button type="button" onclick="window.location='manage_friends.php'">Back</button></td>
			</tr>
		</table>		
		<h6>&copy; Copyright 2016. All Rights Reserved</h6>	
	</body>
</html>