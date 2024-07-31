<?php require_once("includes/config.php");
if(isset($_POST['save']))
{
	$users = new users;
	$errors = array();
	$errors = $users -> validate_add();
	if(!count($errors))
	{
		if($_FILES['avatar']['error']==0)
		{
			$src = $_FILES['avatar']['tmp_name'];
			$dest = FTP_AVATAR_DIR.$_FILES['avatar']['name'];
			if(move_uploaded_file($src,$dest))
			{	
				$_POST['avatar'] = $_FILES['avatar']['name'];
				if($users->save($users->table,$_POST))
				{
					echo "save";
				}
				else
				{
					echo "Fail";
				}
				
			}
			else
			{
				echo "Fail To Move File";
			}
		}
	}
	/*print_r($_POST);
	print_r($_FILES);*/
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
		<script src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="ckeditor/samples/css/sample.css">
	</head>
	<body>
	<form method="post" enctype="multipart/form-data">
		<table cellpadding="10px" cellspacing="0px" width="1000px" align="center" border="1">
			<?php if(isset($errors)){?>
			<tr>
				<td colspan="2">
					<?php echo implode("<br>",$errors);?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>Name :</td>
				<td><input type="text" name="name"/></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="male"/>Male
				<input type="radio" name="gender" value="Female"/>Female
				</td>
			</tr>
			<tr>
				<td>Avatar :</td>
				<td><input type="file" name="avatar"/></td>
			</tr>
			<tr>
				<td>Details :</td>
				<td><textarea name="details" class="ckeditor"></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="save" value="Save"/>
				<input type="button" name="view" value="Show Data" onclick="window.location='show.php'"/>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>