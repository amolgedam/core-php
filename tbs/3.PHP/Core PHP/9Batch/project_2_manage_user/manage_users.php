<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
$sql = mysql_query("select * from users where role='user'");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manage Users</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<div id="container">
		<?php require_once("includes/header.php"); ?>
		<?php require_once("includes/nav.php"); ?>
		<br/>
		<table cellpadding="10px" cellspacing="0px" width="90%" align="center" border="1">
			<tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Last Login</th>
				<th>Last IP</th>
				<th>Status</th>
				<th>Action</th>			
			</tr>
			<?php 
			$sr = 1;
			while($rows = mysql_fetch_array($sql)){ ?>
			<tr>
				<td><?php echo $sr;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['lastlogin'];?></td>
				<td><?php echo $rows['lastip'];?></td>
				<td><?php
					if($rows['status']=='inactive')
					{?>
						<a href="change.php?id=<?php echo $rows['id'];?>&s=i" onclick="return confirm('change status?');"><img src="images/cross.png" alt="Inactive" /></a>
					<?php }
					else
					{ ?>
						<a href="change.php?id=<?php echo $rows['id'];?>&s=a" onclick="return confirm('change status?');"><img src="images/tick.png" alt="Active"/></a>
					<?php }	?></td>
				<td>Edit | Delete</td>
			</tr>
			<?php $sr++;} ?> 
		</table>
		<?php require_once("includes/footer.php"); ?>
		</div>
	</body>
</html>