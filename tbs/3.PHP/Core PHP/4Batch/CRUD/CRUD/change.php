<?php 
require_once("includes/config.php");
if(isset($_GET['id']) && isset($_GET['s']))
{
	if($_GET['s']=='i')
	{
		$status="active";
	}
	else
	{
		$status="inactive";
	}
	mysql_query("update users set status='".$status."' where id='".$_GET['id']."'");
	header("location:manage_users.php");

}


?>