<?php
require_once("includes/config.php");
/*----------------------code for add data----------------*/
$users = new users;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) &&isset($_POST['otp']))
{
	$select = $users->select($users->table,'',"mobile='".$_POST['mobile']."'");
	if(count($select))
	{
		echo 0;
	}
	else
	{
		if($users->save($users->table,$_POST))
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
}	

else
{
	header("location:index.html");
}
?>