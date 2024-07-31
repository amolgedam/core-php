<?php
   require_once("includes/config.php");
   if (!isset($_SESSION['auth']['name']))
   {
	   header("location:index.php;");
   }
   if(!isset($_GET['id']))
   {
	   header("location:guest.php;");
   }
   else
   {
	   	$sql = mysql_fetch_assoc(mysql_query("select * from friends where id=".$_GET['id']));
	    //print_r($sql['avatar']);exit;
	     if(mysql_query("delete from friends where id=".$_GET['id'].""))
	      {
		     unlink("images/avatar/".$sql['avatar']);
		     header("location:guest.php");
	      }
	else
	     {
		     echo "Fail to Delete";
	     }
   }
?>