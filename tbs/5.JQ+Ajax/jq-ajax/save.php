<?php 
require_once("includes/config.php");
$users = new users;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']))
{
	
	if($users->confirm($users->table,$_POST,"id='".$_POST['id']."'"))
	{
		echo 1;
	}
	else
	{
		echo 2;
	}
}
else
{
	if($users->delete($users->table,"id='".$_POST['id']."'"))
	{
		echo 1;
	}
	else
	{
		echo 2;
	}
}


?>