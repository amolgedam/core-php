<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
if($_SESSION ['auth']['role']!='admin')
	{
		header("location:dashboard.php");
	}
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = 1;
	}

	 $rpp = 3;
	 $rsf = ($page * $rpp) - $rpp;
	 $limit = "$rsf , $rpp";
	 
if(isset($_POST['search']))
	{
		$totr = mysql_result(mysql_query("select count(*) from users where role!='admin' and ".$_POST['sb']." like '".$_POST['s']."%'"),0);
		$totp = ceil($totr/$rpp);
		$select = mysql_query("select * from users where role!='admin' and ".$_POST['sb']." like '".$_POST['s']."%' limit $limit ");
	}
	else
	{
		$totr = mysql_result(mysql_query("select count(*) from users where role!='admin'"),0);
		$totp = ceil($totr/$rpp);
		$select = mysql_query("select * from users where role!='admin' limit $limit ");
	
	 }
?>
<html>
     <head>
	     <title>Guest</title>
		 <link href="css/style.css" rel="stylesheet"/>
     </head>
	 <body>
	   	<div class="head">
		     <h1>GUESTBOOK</h1>
	   <div class="navy">
	       <ul>
                 <li><a href="profile.php">Profile</a></li> &nbsp; |
	             <li><a href="cpassword.php">Change Password</a></li> &nbsp; |
	             <li><a href="logout.php">Logout</a></li> &nbsp; |
	      </ul>
	 </div>
	         <?php require_once("includes/nav.php");?>			 
        </div>
		<div id="header_bottom">
            <p>Notice Message</p>
	   </div>
	   <div id="header_bottom3">&nbsp;</div>
	   <div class="header_bottom2">Users</div>
	     <form method="post">
		     <table cellpadding="5px" cellspacing="0px"  border="0" id="table_A">
			      <tr>
				      <td colspan="6" class="table1">
					  <label>Search by :</label>
					     <select name="sb">
						     <option>--select--</option>
							 <option <?php echo isset ($_POST['sb']) && $_POST['sb']=='Name'?'selected':'';?>>Name</option>
							 <option <?php echo isset ($_POST['sb']) && $_POST['sb']=='Email_address'?'selected':'';?>>Email_address</option>
							 <option <?php echo isset ($_POST['sb']) && $_POST['sb']=='Status'?'selected':'';?>>Status</option>
						 </select>
					     <input  type="text" name="s" value="<?php echo isset($_POST['s'])? $_POST['s']:'';?>"/>
						 <input type="submit" name="search" value="search"/>
					  </td>
				  </tr>
			     <tr>
				     <th class="table"></th>
					 <th class="table">sr.no.</th>
					 <th class="table">Name</th>
					 <th class="table">Email</th>
					 <th class="table">Status</th>
					 <th class="table">Friends</th>
				 </tr>
				     <?php
					 if(mysql_num_rows($select))
			      {
				       $sr=1;
				     while($rows = mysql_fetch_array($select)) { ?>
				 <tr>
				     <td class="table1"><input type="checkbox" name="checkbox[]" value="<?php echo $rows['id'];?>"/></td>
					 <td class="table1"><?php echo $sr;?></td>
				     <td class="table1"><?php echo $rows['name'];?></td>
					 <td class="table1"><?php echo $rows['email_address'];?></td>
					 <td class="table1"><?php
					$id= $rows['id'];				
					if($rows['status']=='active')
					{
						echo "<a href='change.php?id=$id&s=a' onclick='return confirm(\"change Status?\");'><img src='images/icons/tick.png' alt='active'/></a>";
					}
					else
					{
						echo "<a href='change.php?id=$id&s=i' onclick='return confirm(\"change Status?\");'><img src='images/icons/cross.png' alt='inactive'/></a>";
					}
					?></td>
					<td class="table1">
					 <?php
						$frnd = mysql_result(mysql_query("select count(*) from friends where user_id='".$rows['id']."'"),0);
						if($frnd > 0)
						{
							echo "<a href='guest.php?user_id=".$rows['id']."'>$frnd</a>";
						}
						else
						{
							echo $frnd;
						}
						
					 ?>  
				    </td>
					 
				 </tr>
                  <?php $sr++;} } else {echo "<tr><td colspan='6'>No Records Found</td></tr>";} ?>
				 <tr>
				    <td colspan="3" class="table1">
					   <button type="button" name="export" onclick="window.location='export.php'">Export</button>
						<button type="button" name="Import" onclick="window.location='import.php'">Import</button>
					</td>
                    <td colspan="3" class="table1">					
						  <?php 
					for($i = 1; $i <= $totp; $i++)
					{
						if($page==$i)
						{
							echo "<span id='current'>".$i."</span>";
						}
						else{
						?>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $i;?>">&nbsp; <?php echo $i;?></a>	
						<?php } } ?>
					 </td>
                  </tr>				  
			 </table>
		 </form>
	       <div id="footer">&copy; Copyright 2016. All Rights Reserved</footer>		 
	     </div>
	</body>
</html>