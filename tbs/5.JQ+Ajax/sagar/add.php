<?php 
//print_r($_POST);
//exit;
	require_once("includes/config.php");
	if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['mobile']))
	{
		echo 0;exit;
	}
	else
	{
		$users = new users;
		$selectdata = $users->select($users->table,"","mobile='".$_POST['mobile']."'");
		
		if(count($selectdata))
		{
			echo 1;exit;
		}
		else
		{
			if($users->save($users->table,$_POST))
			{
				echo 2;exit;
			}
		}
		
		
	}
?>