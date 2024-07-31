<?php
  require_once("includes/config.php");
  if(!isset($_SESSION['auth']['id']))
  {
	 header("location:index.php"); 
  } 
$totu = mysql_num_rows(mysql_query("select * from users where role!='admin'"));
$totg = mysql_num_rows(mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."'"));
$totm = mysql_num_rows(mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' and gender='male'"));
$totf = mysql_num_rows(mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' and gender='female'"));

$users = mysql_query("select * from users where role!='admin' order by id desc limit 0,4");

$guestsm = mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' and gender='male' order by id desc limit 0,4");
$guestsf = mysql_query("select * from friends where user_id='".$_SESSION['auth']['id']."' and gender='female' order by id desc limit 0,4");
?>
<html>
         <!--head section-->
     <head>
	     <title>Dashboard</title>
		 <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 
	     <!--body section-->
	 <body>
	     <div class="head">
		     <h1>GUESTBOOK</h1>
	    <div class="navy">
	         <ul>
	             <li><a href="show.php">Profile</a></li> &nbsp; |
	             <li><a href="cpassword.php">Change Password</a></li> &nbsp; |
	             <li><a href="logout.php">Logout</a></li> &nbsp; |
	          </ul>
	     </div>			 
	         <?php require_once("includes/nav.php");?>
		 </div>
	     <!--form section-->
		 <form method="post" enctype="multipart/form-data">
		     <table cellpadding="0" cellspacing="0" width="70%" border="0" bgcolor="#fff" id="dd"/>
			    <tr>
				   <td>
				   <?php if($_SESSION['auth']['role']=='admin'){ ?>
				       <table cellpadding="0" cellspacing="0" width="95%" align="center" border="0"/>
					   <tr>
					      <th colspan="3">Total Details</th>
					   </tr>
					   <tr>
					       <th class="table">Sr.No</th>
					       <th class="table">Total</th>
					       <th class="table">Count</th>						  
					   </tr>
					   <tr>
					       <td class="table1">1</td>
						   <td class="table1">Total Users :</td>
						   <td class="table1"><?php echo $totu;?></td>
					   </tr>
					   <tr>
					       <td class="table1">2</td>
						   <td class="table1">Total Guests :</td>
						   <td class="table1"><?php echo $totg;?></td>
					   </tr>
					   	<tr>
					       <td class="table1">3</td>
						   <td class="table1">Total Male Guests :</td>
						   <td class="table1"><?php echo $totm;?></td>
					   </tr>
					   <tr>
					       <td class="table1">4</td>
						   <td class="table1">Total Female Guests :</td>
						   <td class="table1"><?php echo $totf;?></td>
					   </tr>
					   </table>
					   </td>&nbsp;
					   <td>
					   <table cellpadding="0" cellspacing="0" width="95%" align="center" border="0">
						   <tr>
							  <th colspan="4"> Last Four Users</th>
						   </tr>
						   <tr>
							  <th class="table">Sr.No</th>
							  <th class="table">Name</th>
							  <th class="table">Email</th>
							  <th class="table">Status</th>
						   </tr>
                              <?php $sr = 1;
			             	  while($rowusers = mysql_fetch_array($users)) { ?>
					          <tr>
						      <td class="table1"><?php echo $sr;?></td>
						      <td class="table1"><?php echo $rowusers['name']; ?></td>
						      <td class="table1"><?php echo $rowusers['email_address']; ?></td>
                              <td class="table1"><?php echo $rowusers['status'];?></td>
		                       <?php $sr++; } ?>
                               </tr>
						  </table>
					   </td>				   
				    </td>
					 <tr>
		               <td>&nbsp;</td>
                      </tr>					  
				   <?php } ?>					  
				</tr>
				  <tr>
					     <td>
					       <table cellpadding="0" cellspacing="0" width="95%" align="center" border="0">
						      <tr>
							     <th colspan="4">Last Male Guests</th>
							  </tr>
						      <tr>
							  <th class="table">Sr.No</th>
							  <th class="table">Name</th>
							  <th class="table">Address</th>
							  <th class="table">Gender</th>
							  </tr>
                              <?php $sr = 1;
					while($rowguestsm = mysql_fetch_array($guestsm)){?>
					<tr>
						<td class="table1"><?php echo $sr;?></td>
						<td class="table1"><?php echo $rowguestsm['name']; ?></td>
						<td class="table1"><?php echo $rowguestsm['address']; ?></td>
						<td class="table1"><?php echo $rowguestsm['gender']; ?></td>
					</tr>
					<?php $sr++; } ?>			
						   </table>
						 </td> 
						 <td>
					       <table cellpadding="0" cellspacing="0" width="95%" align="center" border="0">
						      <tr>
						      <th colspan="4">Last Female Guests</th>
							  </tr>
						      <tr>
							  <th class="table">Sr.No</th>
							  <th class="table">Name</th>
							  <th class="table">Address</th>
							  <th class="table">Gender</th>
							  </tr>
                              <?php $sr = 1;
					while($rowguestsf = mysql_fetch_array($guestsf)){?>
					<tr>
						<td class="table1"><?php echo $sr;?></td>
						<td class="table1"><?php echo $rowguestsf['name']; ?></td>
						<td class="table1"><?php echo $rowguestsf['address']; ?></td>
						<td class="table1"><?php echo $rowguestsf['gender']; ?></td>
					</tr>
					<?php $sr++; } ?>			
						   </table>
						 </td> 
                      </tr>
                    </td>					  
				
			 </table>
		 </form>
		 <!--form section-->
          <!--footer section-->		 
         <div id="footer2">&copy; Copyright 2016. All Rights Reserved</footer>		 
         <!--footer section-->	 
	 </body>
<html>