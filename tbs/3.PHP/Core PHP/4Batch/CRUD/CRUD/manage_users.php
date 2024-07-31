<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
if($_SESSION['auth']['role']!='admin')
{
	header("location:dashboard.php");
}
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = 1;
	}

	$rpp = 10;
	$rsf = ($page * $rpp) - $rpp;
	$limit = "$rsf , $rpp";
	$totr = mysql_result(mysql_query("select count(*) from users where role!='admin'"),0);
	
	$totp = ceil($totr/$rpp);
	
	
	$select = mysql_query("select * from users where role!='admin' limit $limit ");
	 
?>

<html>
	<head>
		<title>Manage Users</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - USERS</h1>
		<?php require_once("includes/nav.php");?>
		<form method="post">
		<table cellpadding="5px" cellspacing="0px" width="90%" border="1" align="center">
			<tr>
				<td colspan="7" style="text-align:right;">
					
				</td>
			</tr>
			<tr>
				<th></th>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Friends</th>
				
			</tr>
			<?php 
			$sr = 1;
			while($rows = mysql_fetch_array($select)){ ?>
			<tr>
				<td><input name="checkbox[]" value="<?php echo $rows['id'];?>" type="checkbox" /></td>
				<td><?php echo $sr;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email_address'];?></td>
				<td><?php
				$id= $rows['id'];				
				if($rows['status']=='active')
				{
					echo "<a href='change.php?id=$id&s=a' onclick='return confirm(\"change Status?\");'><img src='images/icons/tick.png' alt='active'/></a>";
				}
				else
				{
					echo "<a href='change.php?id=$id&s=i' onclick='return confirm(\"change Status?\");'><img src='images/icons/cross.png' alt='inactive'/></a>";
				}
				?></td>
				<td>
				<?php
					$frnd = mysql_result(mysql_query("select count(*) from friends where user_id='".$rows['id']."'"),0);
					if($frnd > 0)
					{
						echo "<a href='manage_friends.php?user_id=".$rows['id']."'>$frnd</a>";
					}
					else
					{
						echo $frnd;
					}
					
				?>
				
				
				</td>
				
			</tr>
			<?php $sr++;} ?>
			<tr>
				
				<td colspan="7">
				<?php 
					for($i = 1; $i <= $totp; $i++)
					{
						if($page==$i)
						{
							echo "<span id='current'>".$i."</span>";
						}
						else{
						?>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $i;?>">&nbsp; <?php echo $i;?></a>	
						<?php }}	?>
				</td>
			</tr>
		</table>
		</form>
		<h6>&copy; Copyright 2016. All Rights Reserved</h6>	
	</body>
</html>