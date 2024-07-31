<?php require_once("includes/config.php");
if(!isset($_GET['id']))
{
	header("location:show.php");
}
$users = new users;
if(isset($_POST['update']))
{
	// Call Validations
	if($_FILES['avatar']['error']==0)
	{
		$no = time();
		$src = $_FILES['avatar']['tmp_name'];
		$dest = FTP_AVATAR_DIR.$no."_".$_FILES['avatar']['name'];
		if(move_uploaded_file($src,$dest))
		{
			$_POST['avatar'] = $no."_".$_FILES['avatar']['name'];
			unlink(FTP_AVATAR_DIR.$_POST['oldavatar']);
		}
	}
	if($users->save($users->table,$_POST,"id='".$_GET['id']."'"))
	{
		
		echo "Update Success";
	}
	else
	{
		echo "update Fail";
	}
	
}



$sql = $users->select($users->table,"","id='".$_GET['id']."'");
foreach($sql as $_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
	</head>
	<body>
	<form method="post" enctype="multipart/form-data">
		<table cellpadding="10px" cellspacing="0px" width="600px" align="center" border="1">
			<?php if(isset($errors)){?>
			<tr>
				<td colspan="2">
					<?php echo implode("<br>",$errors);?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>Name :</td>
				<td><input type="text" name="name" value="<?php echo $_POST['name'];?>"/></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender']=="male")?'checked':'';?>/>Male
				<input type="radio" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender']=="female")?'checked':'';?>/>Female
				</td>
			</tr>
			<tr>
				<td>Avatar :</td>
				<td><input type="file" name="avatar"/>
					<input type="hidden" name="oldavatar" value="<?php echo $_POST['avatar']; ?>"/>
					<img src="<?php echo HTTP_AVATAR_DIR.$_POST['avatar']; ?>" alt="Profile" width="100px" height="100px"/>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="update" value="Update"/>
				<input type="button" name="view" value="Show Data" onclick="window.location='show.php'"/>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>