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