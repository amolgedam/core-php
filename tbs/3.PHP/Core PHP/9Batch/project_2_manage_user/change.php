<?php 
require_once("includes/config.php");
if(isset($_GET['id']) && isset($_GET['s']))
{
	if($_GET['s']=='i')
	{
		$_POST['status'] ="active";
	}
	else
	{
		$_POST['status'] ="inactive";
	}
	mysql_query("update users set status='".$_POST['status']."' where id='".$_GET['id']."'");
	header("location:manage_users.php");
}
else
{
	header("location:manage_users.php");
}

?>