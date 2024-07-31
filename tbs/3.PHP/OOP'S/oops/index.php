<?php
require_once("includes/config.php");

$users = new users;

if(isset($_POST['save']))
{
	$errors = array();
	$errors = $users->validate_add();
	
	if(!count($errors))
	{
		if($_FILES['avatar']['error']==0)
		{
			//print_r($_FILES);exit;
			$no = rand();
			$src = $_FILES['avatar']['tmp_name'];
			$dest = "images/Avatar/".$no."_".$_FILES['avatar']['name'];
			if(move_uploaded_file($src,$dest))
			{
				$_POST['avatar'] = $no."_".$_FILES['avatar']['name'];
			}
			$users->save($users->table,$_POST);
		}
		
	}
}
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
				
				<table cellspacing="0px" cellpadding="10px" width="" border="1px" align="center">
			<tr>
				<td colspan=2></td>
			</tr>
				<tr>
					<td>
						Name:					
					</td>
					<td>
						<input type="text" name="name" />
					</td>
				</tr>
				<tr>
					<td>
						Gender:					
					</td>
					<td>
						<input type="radio" name="gender" value="male"/>Male
						<input type="radio" name="gender" value="female"/>Female
					</td>
				</tr>
				<tr>
					<td>
						Avatar:					
					</td>
					<td>
						<input type="file" name="avatar" />
					</td>
				</tr>
				<tr>
					<td>
					&nbsp;					
					</td>
					<td>
						<input type="submit" name="save" value="save"/>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>