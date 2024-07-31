<?php require_once("includes/config.php");
$users = new users;

if(isset($_POST['deleteall']))
{
	$ID = $_POST['selectbox'];
	$c = count($ID);
	for($s = 0; $s < $c ; $s++)
	{
		$fields = array("id","avatar");
		$select = $users->select($users->table,$fields,"id=".$ID[$s]);
		//print_r($select);
		//echo $select[0]['avatar'];
		if($users->delete($users->table,"id=".$ID[$s]))
		{
			unlink(FTP_AVATAR_DIR.$select[0]['avatar']);
			
		}
	}
	echo "Delete success";
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
$rsf = ($page*$rpp)-$rpp;

$limit = "$rsf,$rpp";
$sql = $users->select($users->table,"","","",$limit);
$tr = count($users->select($users->table));
$tp = ceil($tr/$rpp); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
	</head>
	<body>
		<form method="post">
		<table cellpadding="10px" cellspacing="0px" width="700px" align="center" border="1">
			<tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Avatar</th>
				<th>Action</th>
			</tr>
			<?php foreach($sql as $rows){?>
			<tr>
				<td><input type="checkbox" name="selectbox[]" value="<?php echo $rows['id'];?>"/></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['gender'];?></td>
				<td><img src="<?php echo HTTP_AVATAR_DIR.$rows['avatar'];?>" alt="avatar"width="100px" height="100px"/></td>
				<td>Edit | Delete</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2">
					<input type="submit" name="deleteall" value="Delete Selected" onclick="return confirm('Delete?');"/>
				</td>
				<td colspan="3">
					<?php 
						for($i=1;$i<=$tp;$i++)
						{
							echo "<a href=".$_SERVER['PHP_SELF']."?page=$i>".$i."</a> &nbsp;";
						}
					?> 
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>	
	