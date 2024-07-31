<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
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
	
	
	if(isset($_GET['user_id']))
	{
		$select = mysql_query("select * from friends where user_id='".$_GET['user_id']."' limit $limit ");
	
		$totr = mysql_result(mysql_query("select count(*) from friends where user_id='".$_GET['user_id']."'"),0);
		
	}
	else
	{
		$select = mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' limit $limit ");
	
		$totr = mysql_result(mysql_query("select count(*) from friends where user_id='".$_SESSION['auth']['id']."'"),0);
		
	}
	$totp = ceil($totr/$rpp);
	
	
	 if(isset($_POST['deleteall']))
	 {
		 //print_r($_POST); exit;
		 $id=$_POST['checkbox'];
		 $no=count($id);
		 //echo $no; exit;
		 for($i=0; $i<$no; $i++)
		 {
			 $sql=mysql_fetch_assoc(mysql_query("select * from friends where id=$id[$i]"));
			
			
			$del="delete from friends where id=$id[$i]";
			if(mysql_query($del))
			{
				unlink("images/avatar/".$sql['avatar']);
				header("location:manage_friends.php");
			}
			else
			{
				echo "Failed";
			}
		 }
	 }
?>

<html>
	<head>
		<title>Manage Friends</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - FRIENDS</h1>
		<?php require_once("includes/nav.php");?>
		<form method="post">
		<table cellpadding="5px" cellspacing="0px" width="90%" border="1" align="center">
			<tr>
				<td colspan="7" style="text-align:right;">
					<button type="button" onclick="window.location='addfriend.php'">ADD FRIENDS</button>
				</td>
			</tr>
			<tr>
				<th></th>
				<th>Sr No</th>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Avatar</th>
				<th>Action</th>
			</tr>
			<?php 
			$sr = 1;
			while($rows = mysql_fetch_array($select)){ ?>
			<tr>
				<td><input name="checkbox[]" value="<?php echo $rows['id'];?>" type="checkbox" /></td>
				<td><?php echo $sr;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['address'];?></td>
				<td><?php 
				$getcity = mysql_fetch_assoc(mysql_query("select * from cities where id='".$rows['city_id']."'"));
				echo $getcity['name']; ?></td>
				<td><img src="images/avatar/<?php echo $rows['avatar'];?>" alt="avatar" width="50px"/></td>
				<td>
				<a href="show_friends.php?id=<?php echo $rows['id'];?>">Show</a> | 
				<a href="edit_friends.php?id=<?php echo $rows['id'];?>">Edit</a> | 
				<a href="delete_friends.php?id=<?php echo $rows['id'];?>" onclick="return confirm('delete?');">Delete</a></td>
			</tr>
			<?php $sr++;} ?>
			<tr>
				<td colspan="2">
					<button type="submit" name="deleteall">Delete Selected</button>
				</td>
				<td colspan="5">
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