<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
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
	 $totr = mysql_result(mysql_query("select count(*) from friends where user_id='".$_SESSION['auth']['id']."'"),0);
	
	 $totp = ceil($totr/$rpp);
	
	
	 $select = mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' limit $limit ");
	 if(isset($_POST['deleteall']))
	  {
		  //print_r($_POST); exit;
		  $id=$_POST['checkbox'];
		  $no = count($id);
		  //echo $no; exit;
		  for($i=0; $i<$no; $i++)
		  {
			 $sql=mysql_fetch_assoc(mysql_query("select * from friends where id=$id[$i]"));
			
			
			$del="delete from friends where id=$id[$i]";
			if(mysql_query($del))
				
			{
				unlink("images/avatar/".$sql['avatar']);
				header("location:guest.php");
			}
			else
			{
				echo "Failed";
			}
		 }
	 }
?>
<html>
          <!--head section-->
     <head>
	     <title>Guest</title>
		 <link href="css/style.css" rel="stylesheet"/>
     </head>
		 <!--body section-->
	 <body>
	     <!--header section-->
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
		<!--header section-->
		<div id="header_bottom">
            <p>Notice Message</p>
	   </div>
	   <div class="header_bottom1">&nbsp;</div>
	   <div class="header_bottom2">Guests</div>
	     <!--form section-->
	     <form method="post" enctype="multipart/form-data"/>
		     <table cellpadding="5px" cellspacing="0px"  border="0" id="table_A">
			     <tr class="table1">
				     <td colspan="7" style="text-align:right;">
					     <button type="button" onclick="window.location='addguest.php'">ADD GUESTS</button>
				     </td>
			     </tr>
			     <tr>
				     <th class="table"></th>
					 <th class="table">Sr.No.</th>
					 <th class="table">Name</th>
					 <th class="table">Address</th>
					 <th class="table">City</th>
					 <th class="table">Avatar</th>
					 <th class="table">Action</th>
				 </tr>
				     <?php
				       $sr=1;
				     while($rows = mysql_fetch_array($select)) { ?>
				 <tr>
				     <td class="table1"><input type="checkbox" name="checkbox[]" value="<?php echo $rows['id'];?>"/></td>
					 <td class="table1"><?php echo $sr;?></td>
				     <td class="table1"><?php echo $rows['name'];?></td>
					 <td class="table1"><?php echo $rows['address'];?></td>
					 <td class="table1"><?php 
					     $getcity = mysql_fetch_assoc(mysql_query("select * from cities where id='".$rows['city_id']."'"));
					     echo $getcity['name'];?></td>
					 <td class="table1"><img src="images/avatar/<?php echo $rows['avatar'];?>" alt="avatar" width="40px"></td>
					 <td class="table1">
					     <a href="show.php?id=<?php echo $rows['id'];?>">Show</a>&nbsp;|
						 <a href="edit.php?id=<?php echo $rows['id'];?>">Edit</a>&nbsp;|
						 <a href="delete.php?id=<?php echo $rows['id'];?>" onclick="return conform('delete?');">Delete</a>
					 </td>
				 </tr>
					 <?php $sr++; } ?>
				  <tr>
				     <td colspan="2" class="table1">
					      <button type="submit" name="deleteall" onclick="return confirm('delete selected record?');">
			              <img src="images/icons/cross.png" alt="delete" />Delete Selected</button>
					</td>
                    <td colspan="5" class="table1">					
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
		    <!--form section-->
			<!--footer section-->
              <div id="footer">&copy; Copyright 2016. All Rights Reserved</footer>
             <!--footer section-->			  
	 </body>
	         <!--body section-->
</html>