<!DOCTYPE HTML>
<?php
require_once("includes/config.php");
/*-------------------------code for display data-------------------*/
$users = new guests;
if(isset($_GET['s']))
{
	$sql=$users->select($users->table,'',"name like'".$_GET['s']."%'","name",'');
	
}
else
{
     $sql=($users->select($users->table,'','',"name",''));
} 
	 
?>
<html>
 <head>
	    <title>Employee details</title>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<link href="css/style1.css" rel="stylesheet" type="text/css"/>
	</head>
	    <body>
		<div>
			<table cellpadding="16px" cellspacing="0px" align="center" border="0px" width="90%" class="table" >
            <?php
            if(count($sql)>0)
			{
			foreach($sql as $rows){  ?>			
		    <tr>
			   <td width="10%"><img src="images/avatar/<?php echo $rows['avatar']; ?>" alt="avatar"/></td>
			   <td><?php echo $rows['name']; ?></br>
			   <?php echo $rows['designation']; ?></br>
			   <?php echo $rows['city']; ?></td>
			</tr>
			<?php }}else{?>
			<tr id="mytr">
				<td width="30%">No Records Found.</td>
			</tr>
			 <?php } ?>
		    </table>
			</div>
			</article>
				<footer>&copy; Copyright 2016. All Rights Reserved.</footer>
			</div>
			
	    </body>
</html>
			