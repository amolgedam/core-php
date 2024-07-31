<?php
     require_once("includes/config.php");
	 if(!isset($_SESSION['auth']['id']))
	 {
		 header("location:index.php");
	 }
	 if(isset($_POST['changep']))
	 {	
    	$errors = array();
		$errors = cpassword();
		if (!count($errors))
		{
			$data = mysql_fetch_assoc(mysql_query("select password from users where id= '".$_SESSION['auth']['id']."'"));
			if($data['password'] ==md5($_POST['op']))
			{
				mysql_query("update users set password='".$_POST['np']."' where id='".$_SESSION['auth']['id']."'");
				
				header("location:logout.php");
			}	
			else
			{
				$error= "Old password incorrect";
			}
		}
	 }	
?>
<html>
     <head>
	     <title>change password</title>
		 <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 <body>
	   	<div class="head">
		     <h1>GUESTBOOK</h1>		 
        </div>	
	     <form method="post" enctype="multipart/form-data"/>
	     	     <div id="headerA">
	             <h2>change password</h2>
	              </div></br></br>
		    <table cellpadding="10px" cellspacing="10px" width="400px" align="center" border="0" id="tablec"/>
			<tr>
			     <td colspan="2">
				    <?php
					     if (isset($success))
						 {
							 echo "<font style='color:green'>".$success."</font>";
						 }
						 if (isset($error))
						 {
							 echo "<font style='color:red'>".$error."</font>";
						 }
					?>
				 </td>
			</tr>
			<tr>
			   <td><label>Old Password :<label></td>
			    <td><input type="password" name="op"/>
				    <?php if (isset($errors['op'])) {?>
				<div class="errors">
				    <?php echo $errors['op'];?>
				</div>
					<?php } ?>
                </td>					
			 </tr>
             <tr>
			   <td><label>New Password :<label></td>
			    <td><input type="password" name="np"/>
				 <?php if(isset ($errors['np'])) { ?>
				 <div class="errors">
				  <?php echo $errors['np'];?>
				  </div>
				 <?php } ?>
				</td>
			 </tr>
              <tr>
			   <td><label>Conform Password :<label></td>
			    <td><input type="password" name="cp"/>
				 <?php if(isset($errors['cp'])) { ?>
				 <div class="errors">
				   <?php echo $errors['cp'];?>
				 </div>
				 <?php } ?>
				</td>
			 </tr>
             <tr>
			    <td></td>
				<td><button type="submit" name="changep">Update</button>
				     <button type="button" onclick="window.location='guest.php'"> Back </button>
				</td>
             </tr>			 
	        </table>
		 </form>
	 </body>
</html>